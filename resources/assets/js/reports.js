// Urls to fetch the data from
const FETCH_URL = "/ajax/reports/fetch";

// Modal mapping for each of the report types
var filters = {
    "billings-awv": {
        "modal": "#modal-billings-awv-filter",
        "filters": {
            "employee": null,
            "practice": null,
            "awv_initial": false,
            "awv_updated": false,
            "advanced_care_plan": false,
            "care_plan_development": false,
            "other": false,
        }
    },
    "billings-iccm": {
        "modal": "#modal-billings-iccm-filter",
        "filters": {
            "employee": null,
            "practice": null,
            "awv_initial": false,
            "awv_updated": false,
            "advanced_care_plan": false,
            "care_plan_development": false,
            "other": false,
        }
    },
    "care-plans-initial": {
        "modal": "#modal-care-plans-initial-filter",
        "filters": {
            "employee": null,
            "practice": null
        }
    },
    "care-plans-updated": {
        "modal": "#modal-care-plans-updated-filter",
        "filters": {
            "employee": null,
            "practice": null
        }
    },
    "registrations": {
        "modal": "#modal-registration-filter",
        "filters": {
            "employee": null,
            "practice": null
        }
    },
    "tcm-billable-by-hospital-group":{
        "modal": "#modal-tcm-billable-by-hospital-group-filter",
        "filters": {
            "employee": null,
            "practice": null
        }
    },
    "upcoming-awvs": {
        "modal": "#modal-upcoming-awv-filter",
        "filters": {
            "month": (new Date()).getMonth(),
            "year": (new Date()).getFullYear()
        }
    }
};

// Make note of the initial fetch time to prevent multiple fetches
var fetchTime = 0;

// The URL to go to when a row is clicked
var actionUrl = "";

/**
 * Lock the controls so they don't change during the request
 */
var lock = function() {
    table("reports").setData({}, updateRecordCount).setLoading(true);
    $("select, input, button").prop("disabled", true);
};

/**
 * Unlock the controls
 */
var unlock = function() {
    table("reports").setLoading(false);
    $("select, input, button").prop("disabled", false);
};

/**
 * Fetch the reports of the given category
 *
 * @param {String} category
 */
var fetch = function (category) {
    // Update the newest request time and clear the table
    fetchTime = (new Date()).getTime();
    $("#records").html(`Total Records: 0`);

    // Disable the other form fields while everything is fetched
    lock();

    // Save the request time and send the request
    var fetchInstanceTime = fetchTime;
    $.get(FETCH_URL, {
        "category": category,
        "filters": JSON.stringify(filters[category].filters)
    }, function (result) {
        // Update the table info if no new request has been sent out
        if (fetchInstanceTime == fetchTime) {
            actionUrl = result.action;
            unlock();
            table("reports").setData(result.data, updateRecordCount);
        }
    }).fail(function (result) {
        console.error(result);
        unlock();
    });
};

var applyFilters = function (category) {
    for (var name in filters[category].filters) {
        let elem = $(filters[category].modal).find(`[name="${name}"]`);
        if (elem.attr("type") == "checkbox")
            filters[category].filters[name] = elem.prop("checked");
        else
            filters[category].filters[name] = elem.val() || null;
    }
    fetch(category);
    $(filters[category].modal).modal("hide");
};

/**
 * Update the displayed record count
 */
var updateRecordCount = function () {
    var records = Object.keys(table("reports").filteredData()).length;
    $("#records").html(`Total Records: ${records}`);
};

/**
 * Invoked when a row in the table is clicked
 */
var onRowClick = function (row) {
    window.open(actionUrl + row.id, "_blank");
};

/**
 * Initialize event listeners
 */
var init = function () {
    $("#keywords").keyup(function () {
        table("reports").setKeywordFilter($(this).val(), updateRecordCount);
    });
    $("#date-start").change(function () {
        table("reports").setDateFilter($(this).val(), $("#date-end").val(), updateRecordCount);
    });
    $("#date-end").change(function () {
        table("reports").setDateFilter($("#date-start").val(), $(this).val(), updateRecordCount);
    });
    $("#reports-category").change(function () {
        if ($(this).val()) {
            $("#filter-button").prop("disabled", false).attr("data-target", filters[$(this).val()].modal);
            reports.fetch($(this).val());
        } else {
            $("#filter-button").prop("disabled", true);
        }
    });
    table("reports").click(onRowClick);
    $("[name='billings_awv_filter']").submit(function () {
        applyFilters("billings-awv");
        return false;
    });
    $("[name='billings_iccm_filter']").submit(function () {
        applyFilters("billings-iccm");
        return false;
    });
    $("[name='care_plans_initial_filter']").submit(function () {
        applyFilters("care-plans-initial");
        return false;
    });
    $("[name='care_plans_updated_filter']").submit(function () {
        applyFilters("care-plans-updated");
        return false;
    });
    $("[name='registration_filter']").submit(function () {
        applyFilters("registrations");
        return false;
    });
    $("[name='tcm_billable_by_hospital_group_filter']").submit(function () {
        applyFilters("tcm-billable-by-hospital-group");
        return false;
    });
    $("[name='upcoming_awv_filter']").submit(function () {
        applyFilters("upcoming-awvs");
        return false;
    });
    $("#reports-category").trigger("change");
};

window.reports = {
    fetch: fetch,
    init: init
};
