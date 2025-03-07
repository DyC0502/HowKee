// Auto focus
$(':input:first').focus();
$('.err:first').prev().focus();
$('.err:first').prev().find(':input:first').focus();

// Reset form
$('[type=reset]').click(e => {
   e.preventDefault();
   location = location;
});

// Initiate GET request
$('[data-get]').click(e => {
   
   e.preventDefault();
   
   const url = e.target.dataset.get;
   location = url || location;
});

// Initiate POST request
$('[data-post]').click(e => {
   e.preventDefault();
   
   const url = e.target.dataset.post;
   const f = $('<form>').appendTo(document.body)[0];
   f.method = 'post';
   f.action = url || location;
   f.submit();
});

// Auto uppercase
$('[data-upper]').on('input', e => {
   const a = e.target.selectionStart;
   const b = e.target.selectionEnd;
   e.target.value = e.target.value.toUpperCase();
   e.target.setSelectionRange(a, b);
});


