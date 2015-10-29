<script type="text/javascript">
    $(document).ready(function(){
        $('#blog').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                title: {
                    validators: {
                        notEmpty: {
                            message: 'Title is required and cannot be empty'
                        },
                        stringLength: {
                            min: 2,
                            message: 'Title must be more than 2 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z ]+(?:(?:\\s+|-)[a-zA-Z ]+)*$/,
                            message: 'Title can only consist of alphabets'
                        }
                    }
                },
                category_id: {
                    validators: {
                        notEmpty: {
                            message: 'Category is required and cannot be empty'
                        }
                    }
                },
                radio: {
                    validators: {
                        notEmpty: {
                            message: 'Radio is required and cannot be empty'
                        }
                    }
                },
                details: {
                    validators: {
                        notEmpty: {
                            message: 'Details is required and cannot be empty'
                        },
                        stringLength: {
                            max: 2000,
                            message: 'Details must not be more than 2000 characters long'
                        },
                    }
                }
            }
        });
    });
</script>