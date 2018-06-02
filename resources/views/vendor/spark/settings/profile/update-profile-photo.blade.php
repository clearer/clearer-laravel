<spark-update-profile-photo :user="user" inline-template>
    <div v-if="user">
        <h5 class="mb-4">{{__('Profile Photo')}}</h5>

        <div class="alert alert--danger" v-if="form.errors.has('photo')">
            @{{ form.errors.get('photo') }}
        </div>
                
        <form role="form">
            <div class="form-group">
                <div class="image-placeholder mr-4">
                    <span role="img" class="profile-photo-preview" :style="previewStyle"></span>
                </div>
                <div class="mr-4">
                    <input ref="photo" type="file" class="spark-uploader-control" name="photo" @change="update" :disabled="form.busy">
                </div>
            </div>
        </form>
    </div>
</spark-update-profile-photo>
