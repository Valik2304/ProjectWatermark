

function tinymce_init_callback(editor) {
    editor.remove();
    editor = null;
    tinyMCE.baseURL = '/vendor/tcg/voyager/assets/js';
    tinymce.init({
        mode: 'advanced',
        menubar: true,
        selector:'textarea.richTextBox',
        skin_url: $('meta[name="assets-path"]').attr('content')+'?path=js/skins/voyager',
        min_height: 600,
        resize: 'vertical',
        language_url : '/vendor/tcg/voyager/assets/js/langs/uk.js',
        language:"uk",
        plugins: 'link, image, code, table, textcolor, lists, youtube',
        extended_valid_elements : 'input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]',
        file_browser_callback: function(field_name, url, type, win) {
            if(type =='image'){
                $('#upload_file').trigger('click');
            }
        },
        toolbar: ' fontselect |  fontsizeselect | undo redo | styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table | code | youtube | removeformat',
        convert_urls: false,
        image_caption: true,
        image_title: true,
        invalid_elements: 'pre'
    });
}


/*
tinymce.init({
    selector: 'textarea.richTextBox',
    skin: 'voyager',
    min_height: 100,
    height: 200,
    resize: 'vertical',
    plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern code',
    extended_valid_elements: 'input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]',
    file_browser_callback: function (field_name, url, type, win) {
        if (type == 'image') {
            $('#upload_file').trigger('click');
        }
    },
    toolbar: 'styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table youtube giphy | code',
    convert_urls: false,
    image_caption: true,
    image_title: true,
    valid_elements:'div[*],p[*],span[*],ul[*],li[*],ol[*],hr,br,img[*],-b,-i,-u',
    valid_children:'+li[span|p|div]'
});

*/


