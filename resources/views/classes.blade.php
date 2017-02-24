@include('layout.header',array("pagetitle"=>"Classes"))
@include('layout.topmenu')
@include('layout.leftsidemenu')

<?php $breadcrumb = array("Home", "Classes");
$breadcrumb_url   = array("dashboard", "classes");
$breadcrumbs      = array_combine($breadcrumb, $breadcrumb_url);
$title            = "Classes";
$data             = array('breadcrumbs' => $breadcrumbs, 'title' => $title);?>
@include('layout.breadcrumb',array('data'=>$data))

@include('layout.messages')

{{-- <?php $classnames = array();
foreach ($classes as $class) {
    $classnames[$class->id] = $class->class_name;
}?> --}}

@include('layout.formopen',array('formheading'=>'Add Classes','action'=>'classes','fnid'=>'submit_classs'))
{{-- @include('layout.formselect',array('ft'=>'Classes','fin'=>'class_id','data'=>$classes,'index'=>'id','value'=>'class_name','fiv'=>'')) --}}
@include('layout.forminputtext',array('ft'=>'Class','fin'=>'class','fph'=>'Classs','fiv'=>''))
@include('layout.forminputtext',array('ft'=>'Sequences','fin'=>'sequences','fph'=>'Sequences','fiv'=>''))
@include('layout.formclose')

@include('layout.datatableopening',array('tableheading'=>'Classes List'))

<form action="classes" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_method" value="post">
<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
    <thead>
        <tr>
            <th> SNO.</th>
            <th> Class </th>
            <th> Sequences </th>
            <th> Status </th>
            <th> Actions </th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th> - </th>
            {{-- <th>
                <select name="search_class" id="search_class" class="form-control form-filter">
                <option value="" selected="selected">Select</option>
<?php foreach ($classes as $class) {
    $selected = "";
    if ($search_class == $class->id) {
        $selected = 'selected="selected"';
    }?>
                        <option value="<?php echo $class->id;?>" <?php echo $selected;
    ?> > <?php echo $class->class_name;?></option>
    <?php }?>
                </select>
            </th> --}}
            <th> <input type="text" name="search_class" id="search_class" value="<?php echo $search_class;?>" class="form-control form-filter" /></th>
            <th> <input type="text" name="search_sequences" id="search_sequences" value="<?php echo $search_sequences;?>" class="form-control form-filter"/></th>
            <th>
                <select name="search_status" id="search_status" class="form-control form-filter">
                    <option value="" <?php if ($search_status == "") {?> selected="selected"  <?php }?>>Select</option>
                    <option value="1" <?php if ($search_status == "1") {?> selected="selected"  <?php }?> >Active</option>
                    <option value="2" <?php if ($search_status == "2") {?> selected="selected"  <?php }?> >Suspended</option>
                    <option value="0" <?php if ($search_status == "0") {?> selected="selected"  <?php }?> >Deleted</option>
                </select>
            </th>
            <th>
                <button type="submit" name="search_submit" id="search_submit" class="btn btn-sm green btn-outline filter-submit margin-bottom" value="Search"><i class="fa fa-search"></i> Search</button>
                <a  class="btn btn-sm red btn-outline filter-cancel" href="sections"><i class="fa fa-times"></i> Reset</a>
            </th>
        </tr>
    </tfoot>
    <tbody><?php $i = 1;?>
@foreach($allclasses as $classes)
<?php if ($i%2 == 0) {$odd_even = "odd gradeX";} else { $odd_even = "even gradeX";}$i++;
?>
        <tr class="<?php echo $odd_even;?>">
            <td class="SNO"> </td>
            <td> {{ $classes->class_name }} </td>
            <td> {{ $sections->sequence }} </td>
            <td>    <?php if ($sections->status == 1) {?>
    <span class="label label-sm label-info"> Active </span>
    <?php } else if ($sections->status == 2) {?>
    <span class="label label-sm label-warning"> Suspended </span>
    <?php } else if ($sections->status == 0) {?>
    <span class="label label-sm label-danger"> Deleted </span>
    <?php }?>
</td>
            <td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-left" role="menu">
                        <li>
                            <a data-toggle="modal" href="#view-data-model" data-id="{{ $classes->id }}" data-name="{{ $classes->class_name }}" data-sequence="{{ $sections->sequence }}" class="view-data"><i class="icon-docs"></i> View </a>
                        </li>
                        <li>
                            <a data-toggle="modal" href="#responsive" data-id="{{ $classes->id }}" data-name="{{ $classes->class_name }}" data-sequence="{{ $classes->sequence }}" class="edit-data"><i class="icon-tag"></i> Edit </a>
                        </li>
                        <li class="divider"> </li>
<?php if ($classes->status == 1) {?>
    <li>
    <?php } else if ($classes->status == 2) {?>
    <li>
    <?php }?>
</ul>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</form>
@include('layout.datatableclosing')


@include('layout.modalformopen',array('mid'=>'view-data-model','formheading'=>'View Class','action'=>'','fnid'=>''))
@include('layout.forminputvalue',array('ft'=>'Class','fin'=>'view_class'))
{{-- @include('layout.forminputvalue',array('ft'=>'Section','fin'=>'view_section'))
 --}}@include('layout.forminputvalue',array('ft'=>'Sequences','fin'=>'view_sequences'))
@include('layout.modalviewformclose')

@include('layout.modalformopen',array('mid'=>'responsive','formheading'=>'Edit Class','action'=>'classes','fnid'=>'edit_form'))
{{-- @include('layout.formselect',array('ft'=>'Classes','fin'=>'edit_classes','data'=>$classes,'index'=>'id','value'=>'class_name','fiv'=>'')) --}}
@include('layout.forminputtext',array('ft'=>'Class','fin'=>'edit_class','fph'=>'Class','fiv'=>''))
@include('layout.forminputtext',array('ft'=>'Sequences','fin'=>'edit_sequences','fph'=>'Sequences','fiv'=>''))        @include('layout.modalformclose')

@include('layout.footer')

<script src="{{ URL::asset('js/classes.js') }}" type="text/javascript"></script>

