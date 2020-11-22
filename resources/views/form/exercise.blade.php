@header("Exercise")
@if (isset($form))
    <div class="row">
        <div class="col-md-12 printing-col">
            <label>Level of Activity:</label>
            <span class="printing-span">{{$form->exercise}}</span>
        </div>
    </div>
@else
    <div class="row">
        <div class="form-group col-md-12">
            <select name="exercise" id="exercise" class="custom-select">
                <option value="">Select Exercise</option>
                <option>Sedentary (no exercise)</option>
                <option>Mild exercise (i.e. climb stairs, walk 3 blocks, golf, etc.)</option>
                <option>Occasional vigorous exercise (i.e. work or reacreation, less than 4x/week for 30 min.)</option>
                <option>Regular vigorous exercise (i.e. work or reaction 4x/week for at least 30 min.)</option>
            </select>
        </div>
    </div>
@endif
