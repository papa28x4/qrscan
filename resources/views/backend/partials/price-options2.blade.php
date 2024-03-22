    @if(isset($category))
        <div class="col-md-4 mb-4">
            <label for="size">Type</label>
            <select class="form-control options" id="{{$category->slug}}" name="{{$category->slug}}" >
                <option>Select {{$category->name}} Type</option>
                @foreach($category->items as $item)
                <option value="{{$item->slug}}">
                    {{$item->name}}
                </option>
                @endforeach
            </select>
            @error('paper_type')
            <small  class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        @if($category->slug === 'paper')
            <div class="col-md-4 mb-4">
                <label for="size">Size</label>
                <select class="form-control options" name="paper_size" id="paper_size">
                    <option>Select Paper Size</option>
                    @foreach (\Helper::printOptions()['size'] as $size)
                        <option @if(old('size') == $size) selected @endif  value="{{$size}}">{{$size}}</option>
                    @endforeach
                </select>
                @error('paper_size')
                <small  class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-4 mb-4">
                <label for="paper_gram">Gram</label>
                <select class="form-control options" name="paper_gram" id="paper_gram">
                    <option>Select Paper Gram</option>
                    @foreach (\Helper::printOptions()['paper_gram'] as $gram)
                        <option @if(old('paper_gram') == $gram) selected @endif  value="{{$gram}}">{{$gram}}</option>
                    @endforeach
                </select>
                @error('paper_gram')
                <small  class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        @endif
    @endif
   


