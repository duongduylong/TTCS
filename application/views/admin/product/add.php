<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Sản phẩm</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                Thêm sản phẩm
            </div>
            <div class="panel-body">
                <form class="form-horizontal" name="" method="post" >
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
                        <div class="col-sm-5">
                            <input type="text" name='name' class="form-control" id="inputEmail3" placeholder="" value="<?php echo set_value('name'); ?>">
                        </div>
                        <div class="col-sm-4">
                            <?php echo form_error('name'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh</label>
                        <div class="col-sm-3">
                            <input type="file" id="image" name="image" <?php echo set_value('image') ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh kèm theo</label>
                        <div class="col-sm-5">
                            <input type="file" id="list_image" name="list_image[]" multiple>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Danh mục</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="catalog_id">
                                <option value="">--- Chọn danh mục sản phẩm ---</option>
                                <?php
                                foreach ($catalog as $value) {
                                    if (count($value->sub) > 1) {
                                        ?>
                                        <option value="<?php echo $value->id; ?>" <?php if (set_value('catalog_id') == $value->id) echo 'selected'; ?>><?php echo $value->name; ?></option>
                                        <?php foreach ($value->sub as $val) { ?>
                                            <option value="<?php echo $val->id; ?>" <?php if (set_value('catalog_id') == $val->id) echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $val->name; ?></option>
                                        <?php }
                                        ?>

                                    <?php }else { ?>
                                        <option value="<?php echo $value->id; ?>" <?php if (set_value('catalog_id') == $value->id) echo 'selected'; ?>><?php echo $value->name; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <div class="col-sm-4">
                                <?php echo form_error('catalog_id'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Giá tiền</label>
                        <div class="col-sm-5">
                            <input type="text" name='price' class="form-control" id="inputEmail3" placeholder="" value="<?php echo set_value('price'); ?>">
                        </div>
                        <div class="col-sm-4">
                            <?php echo form_error('price'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Giảm giá</label>
                        <div class="col-sm-5">
                            <input type="text" name='discount' class="form-control" id="inputEmail3" placeholder="" value="<?php echo set_value('discount'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Chi tiết</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" name="content" id='content'><?php echo set_value('content'); ?></textarea>
                        </div>
                    </div>
                    <script>CKEDITOR.replace('content');</script>

                    <div class="form-group">
                        <label for="inputEmail4" class="col-sm-2 control-label">Chi tiết số lượng</label>
                        <?php
                        $input = array();
                        $sizes = $this->size_model->get_list($input);
                        foreach ($sizes as $size) {
                            ?>
                            <label for="inputEmail3" class="col-lg-1" style="margin-top: 10px;text-align: right"><?php echo $size->name ?></label>
                            <div class="col-lg-1">
                                <input type="hidden" name='size_<?php echo $size->id; ?>' class="form-control"  placeholder="" value='<?php echo $size->id ?>' >
                                <input type="text" name='quantity_<?php echo $size->id; ?>' class="form-control"  placeholder="" value="0">
                            </div>

                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-5">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!--/.row-->
