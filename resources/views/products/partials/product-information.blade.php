<h6 class="heading-small text-muted mb-4">{{ __('Product Information') }}</h6>
  <div class="pl-lg-4">
      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="input-name">{{ __('Name') }}&nbsp;<span class="text-danger">*</span></label>
          <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', !empty($product) ? $product->name : '') }}" required autofocus>

          @if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
      </div>
      
      <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="input-price">{{ __('Price') }}&nbsp;<span class="text-danger">*</span></label>
          <input type="number" step=".01" name="price" id="input-price" class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}" value="{{ old('price', !empty($product) ? $product->price : '') }}" required>

          @if ($errors->has('price'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('price') }}</strong>
              </span>
          @endif
      </div>

      <div class="form-group{{ $errors->has('tax') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="input-tax">{{ __('Tax') }}&nbsp;<span class="text-danger">*</span></label>
          <input type="number" step=".01" name="tax" id="input-tax" class="form-control form-control-alternative{{ $errors->has('tax') ? ' is-invalid' : '' }}" placeholder="{{ __('Tax') }}" value="{{ old('tax', !empty($product) ? $product->tax : '') }}" required>

          @if ($errors->has('tax'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tax') }}</strong>
              </span>
          @endif
      </div>
  </div>