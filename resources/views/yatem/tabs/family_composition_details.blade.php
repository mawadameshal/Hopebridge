<form action="{{route('yatem.familyCompositionDetails',$orphan->id)}}" method="post" id="familyCompositionDetails">

    <div class="row">
        <div class="col-md-6 family-form">
            <div class="form-group row">
                <label class="text-left col-md-4">الاسم</label>
                <div class="col-md-8">
                    <input type="text" id="child_name" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-6 family-form">
            <div class="form-group row">
                <label class="text-left col-md-4">سنة الميلاد </label>
                <div class="col-md-8">

                    <input id="child_dob" type="text" class="form-control year-only">
                </div>
            </div>
        </div>
        <div class="col-md-6 family-form">
            <div class="form-group row">
                <label class="text-left col-md-4">الجنس</label>
                <div class="col-md-8">

                    <select id="child_jender" class="form-control">
                        @foreach($Jenders as $jender)
                            <option value="{{$jender->id}}">{{$jender->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6 family-form">
            <div class="form-group row">
                <label class="text-left col-md-4">صلة القرابة </label>
                <div class="col-md-8">
                    <select id="child_relation" class="form-control">
                        @foreach($Relation as $rell)
                            <option value="{{$rell->id}}">{{$rell->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6 family-form">
            <div class="form-group row">
                <label class="text-left col-md-4">المهنة</label>
                <div class="col-md-8">
                    <input type="text" id="child_job" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-6 family-form">
            <div class="form-group row">
                <label class="text-left col-md-4">الحالة الاجتماعية </label>
                <div class="col-md-8">
                    <select id="child_social" class="form-control">
                        @foreach($SocialStatus as $social)
                            <option value="{{$social->id}}">{{$social->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6 family-form">
            <div class="form-group row">
                <label class="text-left col-md-4">المستوى التعليمي </label>
                <div class="col-md-8">
                    <select id="child_qualification" class="form-control">
                        @foreach($Qualifications as $Qualification)
                            <option
                                    value="{{$Qualification->id}}">{{$Qualification->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6 family-form">
            <div class="form-group row">
                <label class="text-left col-md-4">نوع المدرسة</label>
                <div class="col-md-8">
                    <input type="text" id="child_school_type" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-6 family-form">
            <div class="form-group row">
                <label class="text-left col-md-4">الحالة الصحية </label>
                <div class="col-md-8">
                    <select id="child_health" class="form-control">
                        @foreach($Healths as $helth)
                            <option value="{{$helth->id}}">{{$helth->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-6 family-form">
            <div class="form-group row">
                <label class="text-left col-md-4">يوجد كفالة ؟</label>
                <div class="col-md-8">
                    <select id="child_guarantee" class="form-control">
                        <option value="1">نعم</option>
                        <option value="2">لا</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-6 family-form">
            <div class="form-group row">
                <label class="text-left col-md-4">جهة الكفالة</label>
                <div class="col-md-8">
                    <input type="text" id="child_guarantee_source" class="form-control">
                </div>
            </div>
        </div>

        <div class="col-md-6 family-form">
            <div class="form-group row">
                <label class="text-left col-md-4">قيمة الكفالة</label>
                <div class="col-md-8">
                    <input type="text" id="child_guarantee_value" class="form-control">
                </div>
            </div>
        </div>


        <div class="col-md-6 family-form">
            <div class="form-group row">
                <label class="text-left col-md-4">الاحتياج</label>
                <div class="col-md-8">
                    <input type="text" id="child_need" class="form-control">
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <a href="javascript:;" class="add-new-child btn btn-success"><i
                            class="fa fa-plus"></i>اضافة</a>
            </div>
        </div>


        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <th width="20px">#</th>
                    <th width="150px">الاسم</th>
                    <th width="150px">سنة الميلاد</th>
                    <th width="100px">الجنس</th>
                    <th  width="130px" >صلة القرابة</th>
                    <th  width="130px" >المهنة</th>
                    <th  width="130px" >الحالة الاجتماعية</th>
                    <th  width="130px" >المستوى التعليمي</th>
                    <th  width="130px" >نوع المدرسة</th>
                    <th  width="130px" >الحالة الصحية</th>
                    <th  width="130px" >يوجد كفالة</th>
                    <th  width="130px" >جهة الكفالة</th>
                    <th  width="130px" >قيمة الكفالة</th>
                    <th  width="130px" >الاحتياج</th>
                    </thead>
                    <tbody id="children">
                    @forelse($orphan->childs as $key=> $child)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><input type="text" name="child_name[]"  value="{{$child->name}}"
                                       class="form-control"></td>
                            <td><input type="text" name="child_dob[]"  value="{{$child->dob->format('Y')}}"
                                       class="form-control"></td>
                            <td>
                                <select class="form-control" name="child_jender[]">
                                    @foreach($Jenders as $jender)

                                        <option
                                                {{$child->jender_id == $jender->id?"selected":""}}
                                                value="{{$jender->id}}">{{$jender->name}}</option>
                                    @endforeach
                                </select>

                            </td>
                            <td>
                                <select  class="form-control" name="child_relation[]">
                                    @foreach($Relation as $rell)
                                        <option
                                                {{$child->relation==$rell->id?"selected":""}}
                                                value="{{$rell->id}}">{{$rell->name}}</option>
                                    @endforeach
                                </select>

                            </td>
                            <td><input type="text" name="child_job[]"  value="{{$child->job}}"
                                       class="form-control"></td>
                            <td>
                                <select  name="child_social[]" class="form-control">
                                    @foreach($SocialStatus as $social)
                                        <option {{$child->social_id ==$social->id?"selected":""}}
                                                value="{{$social->id}}">{{$social->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="child_qualification[]" class="form-control">
                                    @foreach($Qualifications as $Qualification)
                                        <option {{$child->qualification_id ==$Qualification->id?"selected":""}}
                                                value="{{$Qualification->id}}">{{$Qualification->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" name="child_school_type[]"  value="{{$child->school_type}}"
                                       class="form-control"></td>
                            <td>
                                <select  class="form-control" name="child_health[]">
                                    @foreach($Healths as $helth)
                                        <option {{$child->health_id ==$helth->id?"selected":""}}
                                                value="{{$helth->id}}">{{$helth->name}}</option>
                                    @endforeach
                                </select>
                            </td>

                            <td><input type="text" name="child_guarantee[]"  value="{{$child->guarantee}}"
                                       class="form-control"></td>

                            <td><input type="text" name="child_guarantee_source[]"  value="{{$child->guarantee_source}}"
                                       class="form-control"></td>

                            <td><input type="text" name="child_guarantee_value[]"  value="{{intval($child->guarantee_value)}}"
                                       class="form-control"></td>

                            <td><input type="text" name="child_need[]"  value="{{$child->need}}"
                                       class="form-control"></td>
                            <td>
                                <a href="javascript:;" class="delete-child btn btn-danger btn-sm"><i
                                            class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" id="no-data">لا يوجد بيانات</td>
                        </tr>

                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</form>

<style>
    #familyCompositionDetails td,#familyCompositionDetails th{
        padding: 8px 2px 6px 4px;
    }

    #familyCompositionDetails table input,#familyCompositionDetails table select{
        padding: 0px 4px 0 0;
    }
</style>

<script>
    $(document).ready(function() {
        $('.year-only').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
    });
</script>