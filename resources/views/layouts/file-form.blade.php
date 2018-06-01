<div class="container">
    <div class="new-file">
        <form id="new-file-form" action="#" method="#" @submit.prevent="submitForm">
            <div class="form-row">
                <div class="col-9">
                    <div class="file is-info has-name">
                        <label class="file-label">
                            <input class="file-input" type="file" ref="file" name="file" @change="addFile()">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fa fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Upload new file
                                </span>
                            </span>
                            <span class="file-name" v-if="attachment.name" v-html="attachment.name"></span>
                        </label>
                    </div>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary btn-block">Add new file</button>
                </div>
            </div>
        </form>
    </div>
</div>