@extends('admin.master')
@section('content')
<style>
    .tag-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .tag {
        display: flex;
        align-items: center;
        background-color: green;
        padding: 4px 8px;
        border-radius: 4px;
        color: #fff;
    }

    .tag-text {
        margin-right: 4px;
    }

    .tag-remove {
        cursor: pointer;
    }

    .tags-filter-box {
        position: relative;
    }

    .tags-filter-items div {
        display: none;
        cursor: pointer;
        padding: 4px;
    }

    .tags-filter-items {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #fff;
        box-shadow: 0 0 7px #999;
        z-index: 1;
    }

    #errorMessage {
        color: red;
    }
</style>
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Blog</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-wrap">
                                    <form id="form-blogSubmit" 
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h6 class="txt-dark capitalize-font"><i
                                                    class="zmdi zmdi-account mr-10"></i>Add Blog</h6>
                                            <hr class="light-grey-hr" />
                                            <div class="row">
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10">Title</label>
                                                        <input type="text" name="title" class="form-control"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10">Tag's</label>
                                                        <div class="tag-container mb-2" id="tagContainer"></div>
                                                        <input type="hidden" id="tagContainer" name="tass"
                                                            class="tag-text">
                                                        <div class="tags-filter-box py-2">
                                                            <input type="text" id="tagInput" class="form-control"
                                                                placeholder="Enter a tag and press Enter">
                                                                <div class="tags-filter-items">
                                                                    @foreach($tag as $tag)
                                                                        <div>{{$tag}}</div>
                                                                    @endforeach
                                                                </div>
                                                        </div>
                                                        <div id="errorMessage"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10">Short
                                                            Description</label>
                                                        <textarea class="form-control" name="short_description" id=""
                                                            rows="2"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10">Categories</label>
                                                        @foreach($category as $category)
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox{{ $category->id }}" type="checkbox"
                                                                name="categories[]" value="{{ $category->id }}">
                                                            <label for="checkbox{{ $category->id }}">
                                                                {{ $category->name }} </label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10">Select Images:</label>
                                                        <input type="file" name="images[]" id="imageInput" accept="image/*" multiple />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <label class="control-label mb-10">Description</label>
                                                        <textarea class="tinymce" name="description" id="description"
                                                            rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions mt-10">
                                            <button id="btn-blogsubmit" type="button" class="btn btn-success  mr-10">
                                                Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const tagInput = document.getElementById('tagInput');
    const tagContainer = document.getElementById('tagContainer');
    const errorMessage = document.getElementById('errorMessage');
    tagInput.addEventListener('keydown', function(e) {
        if (e.key === "Enter") {
            e.preventDefault(); // Prevent the Enter key from submitting the form
        }
        if (e.key === 'Enter' && tagInput.value.trim() !== '') {
            const tagText = tagInput.value.trim();
            if (!isTagDuplicate(tagText)) {
                // alert("ookk")
                addTag(tagText);
                tagInput.value = '';
                errorMessage.textContent = '';
            } else {
                errorMessage.textContent = 'Tag already exists!';
            }
        }
        $(".tags-filter-items div").hide();
        // $(this).parent().show();
    });

    function addTag(tagText) {
        const tagDiv = document.createElement('div');
        tagDiv.classList.add('tag');

        const tagTextSpan = document.createElement('span');
        tagTextSpan.classList.add('tag-text');
        tagTextSpan.textContent = tagText;

        const tagRemoveSpan = document.createElement('span');
        tagRemoveSpan.classList.add('tag-remove');
        tagRemoveSpan.innerHTML = '&times;';
        tagRemoveSpan.addEventListener('click', function() {
            tagDiv.remove();
        });

        tagDiv.appendChild(tagTextSpan);
        tagDiv.appendChild(tagRemoveSpan);

        tagContainer.appendChild(tagDiv);
    }
    function isTagDuplicate(tagText) {
        const existingTags = Array.from(tagContainer.getElementsByClassName('tag-text'));
        return existingTags.some(tag => tag.textContent === tagText);
    }
</script>

<script>
    $(document).ready(function() {
        $("#tagInput").on("input", function() {
            var inputText = $(this).val().toLowerCase();
            $(".tags-filter-items div").each(function() {
                var tagText = $(this).text().toLowerCase();
                if (tagText.includes(inputText)) {
                    $(this).parent().show();
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        $(".tags-filter-items div").on("click", function() {
            var selectedTag = $(this).text();

            if (!isTagDuplicate(selectedTag)) {
                addTag(selectedTag);
                errorMessage.textContent = '';
            } else {
                errorMessage.textContent = 'Tag already exists!';
            }
            var currentInput = $("#tagInput").val();
            $("#tagInput").val("");
            $(this).parent().hide()
            // $(".tags-filter-items div").hide();
        });

        var blogForm = $("#form-blogSubmit");
        $("#btn-blogsubmit").click(function(e) {
            e.preventDefault();
        
            var formData = new FormData(); // Create a FormData object

        // Append your form data
        formData.append("title", $("input[name='title']").val());
        formData.append("short_description", $("textarea[name='short_description']").val());
        formData.append("description", tinymce.get("description").getContent());

        // Append your selected categories
        var selectedCategories = $("input[name='categories[]']:checked").map(function() {
            return $(this).val();
        }).get();
        formData.append("categories", selectedCategories);

        // Append your tags
        var tagcontainer = $("#tagContainer");
        var tagtext = tagcontainer.find(".tag-text");
        tagtext.each(function(index, elm) {
            formData.append("tags[]", $(elm).text());
        });

        // Append your file
        formData.append("image", $("#imageInput")[0].files[0]);

        var csrfToken = "{{ csrf_token() }}";
            $.ajax({
            url: "{{ url('/list/blog/save') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Upload failed: " + errorThrown);
            }
        });

            
        })
    })
</script>
@endsection