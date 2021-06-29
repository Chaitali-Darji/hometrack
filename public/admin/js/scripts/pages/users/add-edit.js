$(function () {
  
  var userForm = $('#jquery-user-form');
    
  if (userForm.length) {

    userForm.validate({
      rules: {
        'user[name]': {
          required: true
        },
        'user[email]': {
          required: true,
          email: true
        },
        'user[password]': {
          required: true
        }
      },
      messages: {
        'user[name]': {
            required: "User name required"
        },
        'user[email]': {
            required: "User email required"
        },
        'user[password]': {
            required: "User password required"
        }
      }
    });
  }
});