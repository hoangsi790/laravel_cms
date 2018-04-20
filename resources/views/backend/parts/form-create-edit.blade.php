<div class="row">
    <div class="col-sm-10">

    {!! Form::open([
		'action' => 'PostsController@post_insert',
        'method' => 'POST',
        'files' => 'true'
    ]) !!}
           
        <input type="hidden" name="post_type" value="<?php if ($post_type) {echo $post_type; }?>">   
        <div class="form-group">
            <label><strong>Title</strong></label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label><strong>Content</strong></label>
            <textarea class="form-control" rows="5" id="content" name="content"></textarea>
        </div>
        <div class="form-group">
            <label><strong>Excerpt</strong></label>
            <textarea class="form-control" rows="5" id="excerpt" name="excerpt" placeholder="Excerpts are optional hand-crafted summaries of your content"></textarea>
        </div>
        </div>
        <div class="col-sm-2" id="wrap_sidebar_right">
            <!-- status -->
            <div class="list-group" >
                <div href="javascript:void(0);" class="list-group-item"  style="background:#f5f5f5;"><strong># Status</strong></div>
                <div class=" list-group-item">
                    <div class="post_date_time" style="padding-bottom:8px;font-size:13px;color:#555;"><i class="far fa-calendar-alt"></i> <?php echo date("d/m/Y"); ?> at <small><?php echo date("h:i:sa"); ?></small></div>
                    <div class="form-group">
                        <select id="post_status" class="form-control" name="status">
                            <option value="1">Public</option>
                            <option value="0">Private</option>
                           
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                </div>
            </div>
            <!-- end status -->
            
            <!-- thumbnail -->
            <div class="list-group" >
                <div href="javascript:void(0);" class="list-group-item"  style="background:#f5f5f5;"><strong># Thumbnail</strong></div>
                <div class=" list-group-item" style="padding-bottom:7px;">
                    <div class="thumbnail_post" style="position:relative;display:block;"> <span id="del_thumbnail"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                        <input style="position:absolute;width:100%;height:100%;top:0;left:0;opacity:0;cursor:pointer; " class="input-file" accept="image/*" id="thumbnail" name="thumbnail" type="file" onChange="loadFile(event)">
                        <img src="{{url('/')}}/backend/images/thumbnail.jpg"  id="output_avatar" class="img-thumbnail" style="width:100%;min-height:120px;background:#f5f5f5;text-align:center;line-height:120px; " alt="Thêm ảnh"> </div>
                    <small style="font-style:italic;">Click the image to edit or update</small><br>
                    <script>
                        var loadFile = function(event) {
                            var output = document.getElementById('output_avatar'); output.src = URL.createObjectURL(event.target.files[0]);
                            var thumbnail = document.getElementById('thumbnail'); thumbnail.value = URL.createObjectURL(event.target.files[0]);
                        };
                     </script> 
                </div>
            </div>
            <!-- end thumbnail --> 
            
            <?php if (isset($post_type) and $post_type=='page') {} else { ?>
                <!-- tags -->
                <div class="list-group" >
                    <div href="javascript:void(0);" class="list-group-item"  style="background:#f5f5f5;"><strong># Tags</strong></div>
                    <div class=" list-group-item">
                        

                    <div class="input-group mb-3">
                        <input type="text" class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">Add</button>
                        </div>
                        </div>


                    
                    <div id="wrap_tags">
                    <?php if (isset($tags) and count($tags) > 0) { foreach ($tags as $tag) { ?>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="tags[]" id="<?php echo $tag['id']; ?>" value="<?php echo $tag['id']; ?>"> <?php echo $tag['title']; ?>
                            </label>
                        </div>
                    <?php } } ?>
                    </div>

                    </div>
                </div>
                <!-- end tags -->
            <?php } ?>

            <?php if (isset($post_type) and $post_type=='page') {} else { ?>
                <!-- featured -->
                <div class="list-group">
                    <div href="javascript:void(0);" class="list-group-item"  style="background:#f5f5f5;"><strong># Featured</strong></div>
                    <div class=" list-group-item">
                
                    <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="featured">Set Featured
                    </label>
                    </div>
                    </div>
                </div>
                <!-- end featured -->
            <?php } ?>

            <?php if (isset($post_type) and $post_type=='page') {} else { ?>
                <!-- num order -->
                    <div class="list-group" >
                        <div href="javascript:void(0);" class="list-group-item"  style="background:#f5f5f5;"><strong># Num order</strong></div>
                        <div class=" list-group-item">
                        <div class="form-group">
                            <input type="number" class="form-control" id="post_order" name="post_order"  value="0">
                        </div>
                        </div>
                    </div>
                <!-- end num order -->
            <?php } ?>


        </div>
        {!! Form::close() !!}
</div>
</div>
