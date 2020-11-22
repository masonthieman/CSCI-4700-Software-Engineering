
<div class="row filters">
    @if(isset($form))
        <div class="row">
		
        <div class="col-md-4 printing-col">
           
            <span class="printing-span">{{$form->exercise}}</span>
        </div>
		
        <div class="col-md-4">
            <div class="form-group capitalize">
               
                @selectpatient("patient_id")
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="form-group">               
                @selectactivepractice("practice_id")
            </div>
        </div>-->
         <div class="col-md-4">
            <div class="form-group">
                
                @selectactivepractice("practice_id")
            </div>
        </div>
    </div>
    @else
		<div class="col-md-3">			
					
            <div class="form-group capitalize">                
                <input type="hidden" name="identify" id="identify" value="<?php echo Auth::user()->employee->title_id; ?>">
                <input type="hidden" name="identify" id="hiddenid" value="<?php echo Auth::user()->employee->id; ?>">
            </div>
        </div>
		<div class="col-md-3">
            <div class="form-group capitalize">                
                <!-- @selectteamleader("teamleader") -->
                 <span class="selectd" id="selectd" style="display:none">@selectteamleader("teamleader",["id" => "teamleader_id"])</span>
                <input type="text" class="form-control" name="teamleader" id="teamleader_id_text" value="<?php echo Auth::user()->employee->fname.' '. Auth::user()->employee->lname;?>" style="display:none">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group capitalize">              
               <span id="cm">@selectcaremanager("caremanager")</span> 
                
                    <select name="selectcaremanager" class="form-control" id="caremanager_id" hidden="">
                    </select>
            </div>
        </div>
         <div class="col-md-3">
            <div class="form-group capitalize">                
                @selectactivepractice("practice_id")
            </div>
        </div>
    @endif
</div>
