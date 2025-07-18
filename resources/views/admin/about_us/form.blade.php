<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 col-xs-12">
				<div class="form-group custom-group">
					<label class="form-label required-label">Tiêu đề</label>
					<input class="form-control" ng-model="form.name" type="text">
					<span class="invalid-feedback d-block" role="alert">
						<strong><% errors.name[0] %></strong>
					</span>
				</div>
                <div class="form-group custom-group">
                    <label class="form-label required-label">Mô tả ngắn</label>
                    <textarea class="form-control ck-editor" ck-editor ng-model="form.description" rows="3"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
						<strong><% errors.description[0] %></strong>
					</span>
                </div>
				<div class="form-group custom-group">
					<label class="form-label required-label">Nội dung</label>
					<textarea class="form-control ck-editor" ck-editor ng-model="form.content" rows="3"></textarea>
					<span class="invalid-feedback d-block" role="alert">
						<strong><% errors.content[0] %></strong>
					</span>
				</div>
			</div>
			<div class="col-md-4 col-xs-12">
				<div class="form-group text-center mb-4">
					<label class="form-label required-label">Ảnh</label>
					<div class="main-img-preview">
						<p class="help-block-img">* Ảnh định dạng: jpg, png không quá 1MB.</p>
						<img class="thumbnail img-preview" ng-src="<% form.image.path %>">
					</div>
					<div class="input-group" style="width: 100%; text-align: center">
						<div class="input-group-btn" style="margin: 0 auto">
							<div class="fileUpload fake-shadow cursor-pointer">
								<label class="mb-0" for="<% form.image.element_id %>">
									<i class="glyphicon glyphicon-upload"></i> Chọn ảnh
								</label>
								<input class="d-none" id="<% form.image.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png">
							</div>
						</div>
					</div>
					<span class="invalid-feedback d-block" role="alert">
						<strong><% errors.image[0] %></strong>
					</span>
				</div>
			</div>
		</div>
        <hr>
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Sứ mệnh</label>
                    <textarea class="form-control ck-editor" ck-editor ng-model="form.mission" rows="3"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.mission[0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group text-center mb-4">
                    <label class="form-label required-label">Ảnh sứ mệnh</label>
                    <div class="main-img-preview">
                        <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 1MB.</p>
                        <img class="thumbnail img-preview" ng-src="<% form.mission_image.path %>">
                    </div>
                    <div class="input-group" style="width: 100%; text-align: center">
                        <div class="input-group-btn" style="margin: 0 auto">
                            <div class="fileUpload fake-shadow cursor-pointer">
                                <label class="mb-0" for="<% form.mission_image.element_id %>">
                                    <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                                </label>
                                <input class="d-none" id="<% form.mission_image.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.mission_image[0] %></strong>
                    </span>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Tầm nhìn</label>
                    <textarea class="form-control ck-editor" ck-editor ng-model="form.vision" rows="3"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.vision[0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group text-center mb-4">
                    <label class="form-label required-label">Ảnh tầm nhìn</label>
                    <div class="main-img-preview">
                        <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 1MB.</p>
                        <img class="thumbnail img-preview" ng-src="<% form.vision_image.path %>">
                    </div>
                    <div class="input-group" style="width: 100%; text-align: center">
                        <div class="input-group-btn" style="margin: 0 auto">
                            <div class="fileUpload fake-shadow cursor-pointer">
                                <label class="mb-0" for="<% form.vision_image.element_id %>">
                                    <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                                </label>
                                <input class="d-none" id="<% form.vision_image.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.vision_image[0] %></strong>
                    </span>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Giá trị cốt lõi</label>
                    <textarea class="form-control ck-editor" ck-editor ng-model="form.core_values" rows="3"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.core_values[0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group text-center mb-4">
                    <label class="form-label required-label">Ảnh giá trị cốt lõi</label>
                    <div class="main-img-preview">
                        <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 1MB.</p>
                        <img class="thumbnail img-preview" ng-src="<% form.core_values_image.path %>">
                    </div>
                    <div class="input-group" style="width: 100%; text-align: center">
                        <div class="input-group-btn" style="margin: 0 auto">
                            <div class="fileUpload fake-shadow cursor-pointer">
                                <label class="mb-0" for="<% form.core_values_image.element_id %>">
                                    <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                                </label>
                                <input class="d-none" id="<% form.core_values_image.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.core_values_image[0] %></strong>
                    </span>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Vùng nguyên liệu</label>
                    <textarea class="form-control ck-editor" ck-editor ng-model="form.raw_material_area" rows="3"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.raw_material_area[0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group text-center mb-4">
                    <label class="form-label required-label">Banner vùng nguyên liệu</label>
                    <div class="main-img-preview">
                        <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 1MB.</p>
                        <img class="thumbnail img-preview" ng-src="<% form.raw_material_area_image.path %>">
                    </div>
                    <div class="input-group" style="width: 100%; text-align: center">
                        <div class="input-group-btn" style="margin: 0 auto">
                            <div class="fileUpload fake-shadow cursor-pointer">
                                <label class="mb-0" for="<% form.raw_material_area_image.element_id %>">
                                    <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                                </label>
                                <input class="d-none" id="<% form.raw_material_area_image.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.raw_material_area_image[0] %></strong>
                    </span>
                </div>
                <hr>
                <div class="form-group text-center">
                    <label for="">Album ảnh vùng nguyên liệu</label>
                    <div class="row gallery-area border">
                        <div class="col-md-4 p-2" ng-repeat="g in form.galleries">
                            <div class="gallery-item">
                                <button class="btn btn-sm btn-danger remove" ng-click="form.removeGallery($index)">
                                    <i class="fa fa-times mr-0"></i>
                                </button>
                                <div class="form-group">
                                    <div class="img-chooser" title="Chọn ảnh">
                                        <label for="<% g.image.element_id %>">
                                            <img ng-src="<% g.image.path %>">
                                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="<% g.image.element_id %>">
                                        </label>
                                    </div>
                                    <span class="invalid-feedback d-block" role="alert" ng-if="!errors['galleries.' + $index + '.image_obj']">
                                        <strong>
                                            <% errors['galleries.' + $index + '.image' ][0] %>
                                        </strong>
                                    </span>
                                    <span class="invalid-feedback">
                                        <strong>
                                            <% errors['galleries.' + $index + '.image_obj' ][0] %>
                                        </strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <label class="gallery-item d-flex align-items-center justify-content-center cursor-pointer" for="gallery-chooser">
                                <i class="fa fa-plus fa-2x text-secondary"></i>
                            </label>
                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="gallery-chooser" multiple>
                        </div>
                    </div>
                    <span class="invalid-feedback">
                        <strong>
                            <% errors.galleries[0] %>
                        </strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="text-right">
	<button type="submit" class="btn btn-success btn-cons" ng-click="submit()" ng-disabled="loading.submit">
		<i ng-if="!loading.submit" class="fa fa-save"></i>
		<i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
		Lưu
	</button>
</div>

<style>
    .gallery-item {
        padding: 5px;
        padding-bottom: 0;
        border-radius: 2px;
        border: 1px solid #bbb;
        min-height: 100px;
        height: 100%;
        position: relative;
    }

    .gallery-item .remove {
        position: absolute;
        top: 5px;
        right: 5px;
    }

    .gallery-item .drag-handle {
        position: absolute;
        top: 5px;
        left: 5px;
        cursor: move;
    }

    .gallery-item:hover {
        background-color: #eee;
    }

    .gallery-item .image-chooser img {
        max-height: 150px;
    }

    .gallery-item .image-chooser:hover {
        border: 1px dashed green;
    }
</style>
