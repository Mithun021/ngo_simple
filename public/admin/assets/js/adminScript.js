// >>>>>>>>>>>>>>>>>>> Edit Team Members >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function editTeamMembers(teamid,name,phone,teamimage,status,base_url) {
  $('#user_id').val(teamid);
  $('#user_name').val(name);
  $('#phone_number').val(phone);
  $('#teamProfileImage').html('<img src="'+ base_url +'public/assets/images/team_members/'+ teamimage +'" height="60px">');
 $('#editTeamModal').modal('show');
}

function fetchSillDevelopment(){
  $.ajax({
    type: "get",
    url: "fetchSkillCategory",
    dataType: "json",
    success: function (response) {
      var $select = $('#projectCategory');
      $select.empty(); 

      $select.append('<option value="">Select a category</option>');
      $.each(response, function(index, data) {
          $select.append(
              $('<option></option>').val(data.id).text(data.name)
          );
      });
    }
  });
}

// >>>>>>>>>>>>>>>>>>> Delete Team Members >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function deleteTeam(teamid) { 
  if (confirm('Are you sure..!')) {
    $.ajax({
      type: "post",
      url: "deleteTeamMember",
      data: {teamid : teamid},
      success: function (response) {
        if (response == true) {
          alert('data successfully delete');
          window.location.reload();
        }
        else{
          alert(response);
        }
      }
    });
  }
 }


$(document).ready(function() {

  fetchSillDevelopment();

  // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
  $("#addSkillCarForm").validate({
    rules: {
      skillcategory: {
            required: true,
            minlength: 3
        }
      },
      messages :{
        skillcategory: {
          required: "Please enter your  category",
          minlength: "Your category must be at least 2 characters long"
        }
    },
    submitHandler: function(form) {
      var formData = $(form).serialize();
        $.ajax({
          type: "post",
          url: "addSkillCategory",
          data: formData,
          success: function (response) {
            if (response == true) {
              Swal.fire("Successfullt Add");
              $('#SkillCatModal').modal('hide');
              fetchSillDevelopment();
            }else{
              Swal.fire(response);
            }
            
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
          }
        });
    }
  });

});
