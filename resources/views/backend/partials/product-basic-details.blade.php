<div> 
  <h4 style="border-bottom: 1px solid #ced4da; padding-bottom: 10px">Specification</h4>
</div>

<div class="row tm-edit-product-row py-4">                         
  <div class="col-12 px-4 order-2 order-lg-1">
    <div class="row">
      <div class="form-group col-4 mb-3">
        <label
          for="processor"
          >Processor
        </label>
        <input
          id="processor"
          name="processor"
          type="text"
          class="form-control validate"
          value= "{{old('processor') ? old('processor') : (isset($product) ? $product->basic_details['processor'] : '')}}"
        />
        @error('processor')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group col-4 mb-3">
        <label
          for="memory"
          >Memory
        </label>
        <input
          id="memory"
          name="memory"
          type="text"
          class="form-control validate"
          value= "{{old('memory') ? old('memory') : (isset($product) ? $product->basic_details['memory'] : '')}}"
        />
        @error('memory')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group col-4 mb-3">
        <label
          for="storage"
          >Storage
        </label>
        <input
          id="storage"
          name="storage"
          type="text"
          class="form-control validate"
          value= "{{old('storage') ? old('storage') : (isset($product) ? $product->basic_details['storage'] : '')}}"
        />
        @error('storage')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>
    </div>
  </div>
  <div class="col-12 px-4 order-2 order-lg-1">
    <div class="row">
      <div class="form-group col-4 mb-3">
        <label
          for="os"
          >Operating System
        </label>
        <input
          id="os"
          name="os"
          type="text"
          class="form-control validate"
          value= "{{old('os') ? old('os') : (isset($product) ? $product->basic_details['os'] : '')}}"
        />
        @error('os')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group col-4 mb-3">
        <label
          for="screen"
          >Screen
        </label>
        <input
          id="screen"
          name="screen"
          type="text"
          class="form-control validate"
          value= "{{old('screen') ? old('screen') : (isset($product) ? $product->basic_details['screen'] : '')}}"
        />
        @error('screen')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group col-4 mb-3">
        <label
          for="wireless"
          >Wireless
        </label>
        <input
          id="wireless"
          name="wireless"
          type="text"
          class="form-control validate"
          value= "{{old('wireless') ? old('wireless') : (isset($product) ? $product->basic_details['wireless'] : '')}}"
        />
        @error('wireless')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>
    </div>
  </div>
</div>