<input type="hidden" name="_token"     value="{{ csrf_token() }}">
<input type="hidden" name="user_id"    value="{{Auth::user()->user_id}}">
<input type="hidden" name="brand_name" value="{{Auth::user()->brand_name}}">
<input type="hidden" name="phone"      value="{{Auth::user()->phone}}">
<input type="hidden" name="company_name"
       value="{{Auth::user()->organization_name}}">