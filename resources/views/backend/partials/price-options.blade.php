@if($cat_id || old('category_id'))
    <div class="form-row mb-0">
        <div class="form-group w-50 px-1">
            <label for="media" class="media-label">{{old('category_id') == 27 || $cat_id == 27 ? 'Media Size' : 'Media'}}</label>
            @if($cat_id === 27 || old('category_id'))
                <span class="currencyinput form-control"><input type="text" id="media" name="media" value={{old('media')}}></span>  
                @else
                <span class="currencyinput form-control"><input type="text" id="media" name="media" value={{old('media') ?? 'Flex'}}></span>  
            @endif
            @error('media')
                <small id="mediaHelp" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    
    @if(old('category_id') == 27 || $cat_id == 27)
        <section class="mb-4">
            <div class="headings">
                <h4 class="mb-0">Print</h4>
                <hr>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 mb-4">
                <label for="mono-print">Mono</label>
                <span class="currencyinput form-control">₦<input type="number"  id="mono-print" name="mono_print" value={{old('mono_print')}} ></span>
                @error('mono_print')
                    <small id="monoPrintHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="form-group col-md-6 mb-4">
                <label for="color-print">Colour</label>
                <span class="currencyinput form-control">₦  <input type="number" id="color-print" name="color_print" value={{old('color_print')}}></span>
                @error('color_print')
                    <small id="colorPrintHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
        </section>

        <section class="mb-4">
            <div class="headings">
                <h4 class="mb-0">Copy</h4>
                <hr>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 mb-4">
                    <label for="mono-copy">Mono</label>
                    <span class="currencyinput form-control">₦<input type="number" id="mono-copy" name="mono_copy" value={{old('mono_copy')}}></span>
                    @error('mono_copy')
                        <small id="monoCopyHelp" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6 mb-4">
                    <label for="color-copy">Colour</label>
                    <span class="currencyinput form-control">₦<input type="number" id="color-copy" name="color_copy" value={{old('color_copy')}}></span>
                    @error('color_copy')
                        <small id="colorCopyHelp" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </section>

        <section>
            <div class="headings">
                <h4 class="mb-0">Scan</h4>
                <hr>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="scan">Mono | Color</label>
                    <span class="currencyinput form-control">₦<input type="number" id="scan" name="scan" value={{old('scan')}}></span>
                    @error('scan')
                        <small id="scanHelp" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

        </section>

    @elseif(old('category_id') == 28 || $cat_id == 28)
        <section class="mb-4">
            <div class="form-row">
                <div class="form-group col-md-6 mb-4">
                <label for="color-print">Price/M<sup>2</sup></label>
                <span class="currencyinput form-control">₦ <input type="number" id="square-meter" name="square_meter" value={{old('square_meter')}} /></span>
                @error('square_meter')
                        <small id="sqmtrHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
        </section>
    @endif
@endif