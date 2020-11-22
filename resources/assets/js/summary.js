/*
   Summary Form Javascript
*/

const URL_POPULATE        = "/ajax/summary_populate";
const URL_SAVE            = "/ajax/summary_save";
const URL_SUBMIT          = "/ajax/summary_submit";
const URL_CARE_PLAN_PRINT = "/care-plan/print";

/**
 * Sections with checkable options
 */
const CARE_PLAN_SECTIONS = [
    "symptoms", "goals", "tasks", "resources", "tracking"
];

/**
 * Sections where only text may be entered
 */
const CARE_PLAN_SECTIONS_MISC = [
    "physicians", "pharmacies", "medications"
];

var carePlans = {};

var populateForm = function (patientId) {
    $.get(
        URL_POPULATE,
        {patient_id: patientId},
        function(data) {
            console.log(data);
            carePlans = {};
            $("[data-dynamic-area]").html("");
            form.dynamicFormPopulate("summary_form", data[0]);
            util.updatePhysicianList(
                parseInt($("[name='practice_id']").val()),
                $("#physician"),
                data[0].static.physician_id
            );
            for (let id in data[1]) {
                addCarePlan(data[1][id], false);
            }
            updateCarePlansTable();
            updateBmi();
            $("[name='dob']").trigger("blur");
        }
    ).fail(function(result) {
        console.error("Population Error:", result);
    });
};

/**
 * Invoked when a care plan has been fetched
 *
 * @param {jQuery Object} form
 * @param {JSON Object}   fields
 * @param {JSON Object}   response
 */
var carePlanTemplateFetched = function (form, fields, response) {
    if (response.status == 200) {
        $("#modal-care-plan-add").modal("hide");
        addCarePlan(response.data, true, true);
    }
};

var updateCarePlansTable = function () {
    var rows = {};
    for (var id in carePlans) {
        let condition = carePlans[id];
        rows[id] = {
            id:    id,
            name:  condition.name,
            icd10: condition.adjustedIcd10 || condition.icd10,
            date: util.formatDate(condition.date)
        };
    }
    table("care_plans").setData(rows);
};

var addCarePlan = function (template, updateTable = true, editOnAdd = false) {
    template.adjustedIcd10 = template.adjustedIcd10 || "";
    template.date          = template.date ? new Date(template.date) : new Date();
    template.values        = template.values || {};
    template.others        = template.others || {};
    CARE_PLAN_SECTIONS.forEach(function(sectionId) {
        template.values[sectionId] = template.values[sectionId] || {};
        template.others[sectionId] = template.others[sectionId] || [];
        for (let name in template.template[sectionId]) {
            template.values[sectionId][name] = template.values[sectionId][name] || {checked: false, value: ""};
        };
    });
    if (template.misc == undefined)
        template.misc = {};
    CARE_PLAN_SECTIONS_MISC.forEach(function(sectionId) {
        template.misc[sectionId] = template.misc[sectionId] || [];
    });
    carePlans[template.id] = template;
    if (updateTable)
        updateCarePlansTable();
    if (editOnAdd)
        setTimeout(function() {editCarePlan(template.id)}, 500);
};

var removeCarePlan = function(id) {
    delete carePlans[id];
    $("#modal-care-plan-edit").modal("hide");
    updateCarePlansTable();
};

var saveCarePlan = function() {
    var id = $("#modal-care-plan-edit").attr("data-careplan-id");
    var condition = carePlans[id];
    condition.adjustedIcd10 = $("#modal-care-plan-edit [name='icd10']").val();
    condition.date          = new Date($("#modal-care-plan-edit [name='date']").val());
    if (isNaN(condition.date.getTime()))
        condition.date = new Date();
    CARE_PLAN_SECTIONS.forEach(function(sectionId) {
        condition.values[sectionId] = {};
        condition.others[sectionId] = [];
        let section = $(`#modal-care-plan-edit-${sectionId}`);
        for (var name in condition.template[sectionId]) {
            condition.values[sectionId][name] = {
                checked: section.find(`[name="${name}_yn"]`).is(":checked"),
            };
            if (condition.template[sectionId][name].type == 1) {
                condition.values[sectionId][name].value = section.find(`[name="${name}_desc"]`).val() || "";
            }
        }
        $(`#modal-care-plan-edit [data-dynamic-area='care_plan_${sectionId}'] input`).each(function() {
            if ($(this).val().trim())
                condition.others[sectionId].push($(this).val().trim());
        });
    });
    CARE_PLAN_SECTIONS_MISC.forEach(function(sectionId) {
        condition.misc[sectionId] = [];
        $(`[data-dynamic-area="care_plan_${sectionId}"] .row`).each(function() {
            let values = [];
            $(this).find("input,select").each(function() {
                values.push($(this).val());
            });
            condition.misc[sectionId].push(values);
        });
    });
    console.log("Saving condition", condition);
    updateCarePlansTable();
    return condition;
};

var editCarePlan = function (id) {
    var condition = carePlans[id];
    console.log("Loaded condition:", condition);
    var modal = $("#modal-care-plan-edit");
    modal.find("#modal-care-plan-edit-title").html(condition.name);
    modal.find(".dynamic-form").remove();
    modal.find("#modal-care-plan-edit-icd10").html(condition.icd10);
    modal.find("[name='icd10']").val(condition.adjustedIcd10);
    modal.find("[name='date']").val(util.dateValue(condition.date));
    CARE_PLAN_SECTIONS.forEach(function (sectionId) {
        let body = $(`#modal-care-plan-edit-${sectionId}`).html("");
        buildCarePlanFields(condition, sectionId);
        condition.others[sectionId].forEach(function(value) {
            form.dynamicFormAdd(`care_plan_${sectionId}`, {option: value});
        });
    });
    CARE_PLAN_SECTIONS_MISC.forEach(function (sectionId) {
        condition.misc[sectionId].forEach(function(values) {
            let obj = {};
            for (let i in values) {
                obj[`value${i}`] = values[i];
            }
            form.dynamicFormAdd(`care_plan_${sectionId}`, obj);
        });
    });
    modal.attr("data-careplan-id", id);
    modal.modal("show");
};

var buildCarePlanFields = function (condition, sectionId) {
    var makeCheckbox = function(name, checked, label) {
        let container   = $("<div class='custom-control custom-checkbox'>");
        let checkbox    = $("<input type='checkbox' class='custom-control-input'>")
                              .attr("id", name + "-yn").attr("name", name + "_yn").prop("checked", checked);
        let description = $("<label class='custom-control-label'>")
                              .attr("for", name + "-yn").html(label);
        return container.append(checkbox).append(description);
    };
    var makeTextEntry = function(name, value) {
        return $("<input class='form-control' placeholder='(Optional) Describe...'>")
                   .attr("id", name + "-desc").attr("name", name + "_desc").val(value);
    };

    var body = $(`#modal-care-plan-edit-${sectionId}`);
    for (var name in condition.template[sectionId]) {
        let fieldMeta = condition.template[sectionId][name];
        let checkbox = makeCheckbox(name, condition.values[sectionId][name].checked, fieldMeta.description);
        let col = $("<div class='col-12 form-group'><div>").append(checkbox);
        let row = $("<div class='row'>").append(col);
        if (fieldMeta.type == 1) {
            row.append($("<div class='col-sm-6 form-group'><div>").append(makeTextEntry(name, condition.values[sectionId][name].value)));
            row.find(".col-12").removeClass("col-12").addClass("col-sm-6");
        }
        body.append(row);
    }
};

/**
 * Generate the HTML inputs that contain the information on the care plans
 */
var buildCarePlans = function () {
    var cond = $("#care-plan-values").html("");
    for (let id in carePlans) {
        let condition = carePlans[id];
        $("<input type='hidden'>").attr(
            "name", `care_plan[${condition["id"]}][icd10]`
        ).val(condition.adjustedIcd10).appendTo(cond);
        $("<input type='hidden'>").attr(
            "name", `care_plan[${condition["id"]}][date]`
        ).val(util.dateValue(condition.date)).appendTo(cond);
        CARE_PLAN_SECTIONS.forEach(function(sectionId) {
            for (let hash in condition.values[sectionId]) {
                $("<input type='hidden'>").attr(
                    "name", `care_plan[${condition["id"]}][values][${sectionId}][${hash}]`
                ).val(JSON.stringify(condition.values[sectionId][hash])).appendTo(cond);
            }
            condition.others[sectionId].forEach(function (value) {
                $("<input type='hidden'>").attr(
                    "name", `care_plan[${condition["id"]}][others][${sectionId}][]`
                ).val(value).appendTo(cond);
            });
        });
        CARE_PLAN_SECTIONS_MISC.forEach(function (sectionId) {
            condition.misc[sectionId].forEach(function(values, index) {
                for (let i in values) {
                    $("<input type='hidden'>").attr(
                        "name", `care_plan[${condition["id"]}][misc][${sectionId}][${index}][]`
                    ).val(values[i]).appendTo(cond);
                }
            });
        });
    };
};

var onPharmacyAdded = function (event, group, elem) {
    var index = form.dynamicForm("care_plan_pharmacies").children().length + 1;
    elem.find("[data-dynamic-index]").html(index);
    form.dynamicForm("care_plan_medications").find("[name$='value0]']").append(`<option value="${index}">${index}</option>`);
};

var onPharmacyRemoved = function (event, group, elem) {
    var index = parseInt(elem.find("[data-dynamic-index]").html());
    var dropdowns = form.dynamicForm("care_plan_medications").find("[name$='value0]']");
    dropdowns.find(`[value="${index}"]`).remove();
    elem.nextAll().each(function (i) {
        $(this).find("[data-dynamic-index]").html(index + i);
        dropdowns.find(`[value="${index+i+1}"]`).val(index + i).html(index + i);
    });
};

var onMedicationAdded = function (event, group, elem) {
    var dropdown = elem.find("[name='value0']");
    dropdown.append("<option value='0'>None</option>");
    form.dynamicForm("care_plan_pharmacies").find("[name$='value0]']").each(function (i) {
        dropdown.append(`<option value="${i+1}">${i+1}</option>`);
    });
};

var updatePharmacyIndices = function () {
    console.log(form.dynamicForm("care_plan_pharmacies"), form.dynamicForm("care_plan_pharmacies").find("[data-dynamic-index]"));
    form.dynamicForm("care_plan_pharmacies").find("[data-dynamic-index]").each(function (index) {
        $(this).html(index + 1);
    });
};

var updateBmi = function () {
    var result = 0;
    try {
        let weight = $("[name='vital_weight']").val();
        let height = $("[name='vital_height']").val();
        result = weight / Math.pow(height, 2) * 703;
    } catch (e) {
        console.warn(e);
    }
    $("#bmi").val(result.toFixed(1));
}

var onResult = function (form, data, response) {
    if (response.status == 200) {
        notify.success("Summary saved successfully!");
    }
};

var onSubmit = function (formName) {
    buildCarePlans();
    return true;
};

var printCarePlans = function(carePlans) {
    var list = [];
    carePlans.forEach(function(condition) {
        var carePlan = {
            id    : condition.id,
            icd10 : condition.adjustedIcd10,
            date  : condition.date,
            others: {},
            values: {},
            misc: {}
        };
        for (let key in condition.others) {
            if (Object.keys(condition.others[key]).length > 0) {
                carePlan.others[key] = condition.others[key];
            }
        }
        for (let key in condition.values) {
            if (Object.keys(condition.values[key]).length > 0) {
                carePlan.values[key] = condition.values[key];
            }
        }
        for (let key in condition.misc) {
            if (Object.keys(condition.misc[key]).length > 0) {
                carePlan.misc[key] = condition.misc[key];
            }
        }
        list.push(carePlan);
    });
    var carePlanJson = JSON.stringify(list);
    var url          = `${URL_CARE_PLAN_PRINT}?care_plans=${encodeURI(carePlanJson)}`;
    var patientId    = $("[name='patient_id']").val();
    window.open(`${url}&patient=${patientId}`, "_blank");
};

var init = function () {
    $("[name='patient_id']").change(function() {
        populateForm($(this).val());
    });
    table("care_plans").click(function(row) { editCarePlan(row.id) });
    $("#care-plans-print").click(function() {
        printCarePlans(Object.values(carePlans));
    });
    $("#modal-care-plan-edit-remove").click(function() {
        removeCarePlan($("#modal-care-plan-edit").attr("data-careplan-id"));
    });
    $("#modal-care-plan-print").click(function() {
        var condition = saveCarePlan();
        printCarePlans([condition]);
    });
    $("#modal-care-plan-edit-save").click(function() {
        saveCarePlan();
        $("#modal-care-plan-edit").modal("hide");
    });
    $("[name='vital_weight'], [name='vital_height']").change(updateBmi);
    $("#summary-submit").click(function() {
        $("[name='summary_form']").attr("action", URL_SUBMIT).submit();
    });
    $("[name='practice_id']").on("changed.bs.select", function () {
        util.updatePhysicianList(parseInt($(this).val()), $("#physician"));
    });
    form.ajaxForm("summary_form", onResult, summary.onSubmit, function() {
        $("[name='summary_form']").attr("action", URL_SAVE);
        notify.danger("Invalid information provided");
        return true;
    });
    form.ajaxForm("ajax.care_plan.templates.fetch_form", summary.carePlanTemplateFetched, null, function(form, fields, response) {
        notify.danger("Invalid information provided");
        return true;
    });
    form.dynamicForm("care_plan_pharmacies").on("dynamic-area-add", onPharmacyAdded);
    form.dynamicForm("care_plan_pharmacies").on("dynamic-area-remove", onPharmacyRemoved);
    form.dynamicForm("care_plan_medications").on("dynamic-area-add", onMedicationAdded);
};

window.summary = {
    carePlanTemplateFetched: carePlanTemplateFetched,
    init: init,
    onSubmit: onSubmit,
    carePlans: carePlans,
    buildCarePlans: buildCarePlans
};
