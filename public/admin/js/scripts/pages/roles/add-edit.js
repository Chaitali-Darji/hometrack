$(function () {
  
  var roleForm = $('#jquery-role-form');
    
  if (roleForm.length) {

    roleForm.validate({
      rules: {
        'role[name]': {
          required: true
        }
      },
      messages: {
        'role[name]': {
            required: "Role name required"
        }
      }
    });
  }
});