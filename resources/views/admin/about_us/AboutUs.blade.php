@include('admin.about_us.AboutUsGallery')
<script>
    class AboutUs extends BaseClass {
        no_set = [];
        before(form) {
            this.image = {};
            this.mission_image = {};
            this.vision_image = {};
            this.core_values_image = {};
            this.raw_material_area_image = {};
            this.galleries = [];
        }
        after(form) {
        }
        get image() {
            return this._image;
        }
        set image(value) {
            this._image = new Image(value, this);
        }
		clearImage() {
			if (this.image) this.image.clear();
		}

        get mission_image() {
            return this._mission_image;
        }
        set mission_image(value) {
            this._mission_image = new Image(value, this);
        }
        clearMissionImage() {
            if (this.mission_image) this.mission_image.clear();
        }

        get vision_image() {
            return this._vision_image;
        }
        set vision_image(value) {
            this._vision_image = new Image(value, this);
        }
        clearVisionImage() {
            if (this.vision_image) this.vision_image.clear();
        }

        get core_values_image() {
            return this._core_values_image;
        }
        set core_values_image(value) {
            this._core_values_image = new Image(value, this);
        }
        clearCoreValuesImage() {
            if (this.core_values_image) this.core_values_image.clear();
        }

        get raw_material_area_image() {
            return this._raw_material_area_image;
        }
        set raw_material_area_image(value) {
            this._raw_material_area_image = new Image(value, this);
        }
        clearRawMaterialAreaImage() {
            if (this.raw_material_area_image) this.raw_material_area_image.clear();
        }

        get galleries() {
            return this._galleries || [];
        }

        set galleries(value) {
            this._galleries = (value || []).map(val => new AboutUsGallery(val, this));
        }

        addGallery(gallery) {
            if (!this._galleries) this._galleries = [];
            let new_gallery = new AboutUsGallery(gallery, this);
            this._galleries.push(new_gallery);
            return new_gallery;
        }

        removeGallery(index) {
            this._galleries.splice(index, 1);
        }

        get submit_data() {
            let data = {
                name: this.name,
                slug: this.slug,
                description: this.description,
                content: this.content,
                mission: this.mission,
                vision: this.vision,
                core_values: this.core_values,
                raw_material_area: this.raw_material_area
            }
            data = jsonToFormData(data);
            let image = this.image.submit_data;
            if (image) data.append('image', image);
            let mission_image = this.mission_image.submit_data;
            if (mission_image) data.append('mission_image', mission_image);
            let vision_image = this.vision_image.submit_data;
            if (vision_image) data.append('vision_image', vision_image);
            let core_values_image = this.core_values_image.submit_data;
            if (core_values_image) data.append('core_values_image', core_values_image);
            let raw_material_area_image = this.raw_material_area_image.submit_data;
            if (raw_material_area_image) data.append('raw_material_area_image', raw_material_area_image);

            this.galleries.forEach((g, i) => {
                if (g.id) data.append(`galleries[${i}][id]`, g.id);
                let gallery = g.image.submit_data;
                if (gallery) data.append(`galleries[${i}][image]`, gallery);
                else data.append(`galleries[${i}][image_obj]`, g.id);
            })

            return data;
        }
    }
</script>
