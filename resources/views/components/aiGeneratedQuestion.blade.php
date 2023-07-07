<div>
    <h3>Please Also Add Below Answer</h3>
</div>
@foreach($questions as $question)

    
    @if(!is_null($question) && $question != "")
    <div class="col-lg-12 colL extra-question-section">
        <div class="mb-3">
        <label class="form-label form_box_label market-question"><span class="extra-question-list">{{trim($question)}}?</span></label>
        <input type="text" class="form-control form_box_input" value="">
        </div>
    </div>
    @endif

@endforeach