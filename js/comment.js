// JavaScript source code
function opencommentdialog(story_id) {
    var upload_id = story_id;

    $.Dialog({
        shadow: true,
        overlay: false,
        icon: '<span class="icon-pencil"></span>',
        title: 'Write a comment',
        width: 500,
        padding: 10,
        onShow: function ()
        { $.Dialog.content(dialogcontent(story_id)); }

    });


}