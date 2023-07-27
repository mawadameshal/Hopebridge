{{--@if(!$customer->id)--}}
{{--  <div id="check_duplicate">--}}
{{--    <br>--}}
{{--    <br>--}}
{{--<div class="row">--}}
{{--    <div class="col-md-6">--}}
{{--        <div class="form-group row">--}}
{{--            <label class="text-left col-md-4">رقم الهوية</label>--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="input-group">--}}
{{--                    <input type="text" autofocus class="form-control"--}}
{{--                           value="{{old("id_number")}}" id="id_number" name="id_number">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="col-md-2">--}}
{{--        <button onclick="gitCitizen();return false;"--}}
{{--                class="btn btn-primary">--}}
{{--            بحث--}}
{{--        </button>--}}
{{--    </div>--}}

{{--</div>--}}
{{--    <hr>--}}
{{--  </div>--}}
{{--@endif--}}


<form action="{{route('customers.personal',$customer->id)}}" id="personalForm" >
    <br>
    <br>
<input type="hidden" name="type" value="1">
<div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class=" text-left col-md-4"> الاسم رباعي </label>
                <div class="col-md-8">
                    <input type="text" name="name" value="{{$customer->name??''}}" class="form-control" required>
                    <span class="name" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class=" text-left col-md-2"> اسم الباحث </label>
                <div class="col-md-10">
                    <input type="text" name="researcher_name" value="{{$customer->researcher_name??auth()->user()->name}}" class="form-control" required>
                    <span class="researcher_name" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="text-left col-md-4">المحافظة</label>
                <div class="col-md-8">
                    <select name="state_id" id="state_id" class="form-control" onchange="getState();" required>
                        <option value=""> -- اختر المحافظة --</option>
                        @foreach($States as $state)
                            <option {{($customer->state_id??0)==$state->id?"selected":""}} value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                    <span class="state_id" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="text-left col-md-2">اختر المنطقة</label>
                <div class="col-md-10">
                    <select name="region_id" id="region_id" class="form-control select2" required>
                        @foreach($Regions as $region)
                            <option {{($customer->region_id??0)==$region->id?"selected":""}} value="{{$region->id}}">{{$region->name}}</option>
                        @endforeach
                    </select>
                    <span class="region_id" style="color: darkred"></span>
                </div>
            </div>


        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="text-left col-md-4">الحي</label>
                <div class="col-md-8">
                    <input type="text" value="{{$customer->neighborhood??''}}" name="neighborhood" placeholder="الحي" class="form-control"
                           required>
                    <span class="neighborhood" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-group row">
                <label class="text-left col-md-2">الشارع</label>
                <div class="col-md-10">
                    <input type="text" name="street"  value="{{$customer->street??''}}" placeholder="الشارع" class="form-control"
                           required>
                    <span class="address" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="form-group row">
                <label class="text-left col-md-2">العنوان</label>
                <div class="col-md-10">
                    <input type="text" name="address"  value="{{$customer->address??''}}" placeholder="العنوان" class="form-control">
                    <span class="address" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="text-left col-md-4">جوال /الهاتف</label>
                <div class="col-md-8">
                    <input type="text" name="mobile"  value="{{$customer->mobile??''}}" required placeholder="الجوال" class="form-control">
                    <span class="mobile" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="text-left col-md-2">جوال بديل</label>
                <div class="col-md-10">
                    <input type="text" name="mobile2"  value="{{$customer->mobile2??''}}" placeholder="جوال بديل" class="form-control">
                    <span class="mobile2" style="color: darkred"></span>
                </div>
            </div>
        </div>

</div>
</form>