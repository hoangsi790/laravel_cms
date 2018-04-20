@extends('backend.layouts.master')

<!-- title -->
@section('title') All posts @endsection
<!-- end title -->



<!-- primary content -->
@section('content')
<div class="rows">
    @include('backend.layouts.breadcrumb') @include('backend.layouts.pagination')
</div>


<div class="rows">
    <?php if (isset($posts) and count($posts) > 0) {?>
    <table class="table table-bordered table-striped wrap_data">
        <thead>
            <tr>
                <th class="text-center" style="width:25px;"><input type="checkbox" id="1"></th>
                <th style="width:65px;" class="text-center">Thumbnail</th>
                <th>Title</th>
                <th class="text-center" style="width:95px;">Author</th>
                <?php if (isset($post_type) and $post_type=='page') {} else { ?>
                    <th>Tags</th>
                    <th class="text-center" style="width:65px;">Featured</th>
                <?php } ?>
                <th class="text-center" style="width:70px;">Date</th>
                <th class="text-center" style="width:125px;">Options</th>
            </tr>
        </thead>
        <tbody id="data-words">



            <?php foreach ($posts as $post) {?>
            <tr>
                <td class="text-center">
                    <input type="checkbox" id="<?php if ($post['id']) {echo $post['id'];}?>">
                </td>
                <td class="text-center">
                    <?php if ($post['thumbnail']) {?>
                    <a href="{{url('/')}}/backend/<?php echo $post['post_type']; ?>/edit/<?php echo $post['id']; ?>" title="<?php if ($post['title']) { echo $post['title']; } ?>">
                        <?php echo $post['title']; ?>
                    </a>
                    <?php } else { ?>
                      <a href="{{url('/')}}/backend/<?php echo $post['post_type']; ?>/edit/<?php echo $post['id']; ?>" title="<?php if ($post['title']) { echo $post['title']; } ?>">
                        <img class="thumbnail_small" src="{{url('/')}}/backend/images/thumbnail.jpg" alt="<?php if ($post['title']) { echo $post['title']; } ?>">
                    </a>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($post['title']) {?>
                    <a href="{{url('/')}}/backend/<?php echo $post['post_type']; ?>/edit/<?php echo $post['id']; ?>">
                        <?php echo $post['title']; ?>
                    </a>
                    <?php }?>
                </td>
                <td class="text-center">
                    <?php if ($post['user_display_name']) {echo $post['user_display_name'];}?>
                </td>
                <?php if (isset($post_type) and $post_type=='page') {} else { ?>
                    <td>
                    <?php if (isset($post['tags']) and count($posts['tags']) > 0) {?>
                        <?php $tags = $post['tags']; foreach ($tags as $tag) {?>

                       
                    
                        <?php }?>
                    <?php }?>
                    
                    </td>
                    <td class="text-center">
                        <?php if ($post['featured'] and $post['featured'] == '1') {?>
                        <i class="text-success far fa-check-square"></i>
                        <?php }?>
                    </td>
                <?php } ?>
                <td>
                    <?php if ($post['created_at']) {echo $post['created_at'];}?>
                </td>
                <td class="text-center">
                    <a href="a" target="_blank" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="a" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" onClick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                        title="Trash">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <?php }?>

        </tbody>
    </table>
    <?php }?>
</div>
<div class="rows">
    @include('backend.layouts.pagination')
</div>

@endsection
<!-- end primary content -->