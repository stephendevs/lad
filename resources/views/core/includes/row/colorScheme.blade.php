<div class="row mb-5">
    <div class="col-lg-12"><h6>Color Scheme</h6><hr /></div>
    @php
        $color = ['Default', 'Light', 'Dark', 'Red'];
    @endphp      
    @for ($i = 0; $i < count($color); $i++)
    <div class="col-lg-4 mb-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group form-check mb-2">
                    <input type="checkbox" name="theme" id="{{ $color[$i] }}" class="" />
                    <label for="{{ $color[$i] }}" class="form-check-label ">{{ $color[$i] }}</label>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-2 bg-primary"></div>
            <div class="col-lg-2 bg-dark"></div>
            <div class="col-lg-2 bg-light"></div>
            <div class="col-lg-2 bg-secondary">.</div>
        </div>
    </div>
    @endfor

</div>