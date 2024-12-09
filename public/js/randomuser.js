//create random user "supervisor"
$('#create-random-user-supervisor').on('click', function(){

$.ajax({
    url: 'https://randomuser.me/api/',
    dataType: 'json',
    success: function(data) {
        console.log(data);

      const user =data.results;

      console.log(user);


      const randomUser = {
        name: user[0].name.first,
        surname: user[0].name.last,
        email: user[0].email,
        role: 'supervisor',
        username: user[0].login.username,
        passwordUser: 'testing10',
        img: "uploads/users/imagen_predefinida.png"
      };

      $.ajax({
        url: "/adminusarios/añadir",
        method: 'POST',
       
        data: randomUser,
        success: function (response){
            console.log('Usuario guardado en la bdd', response);
            alert ('¡Usuario Creado Correctamente!');
        },
        error: function (xhr, status, error){
            console.log('Error al guardar en la bdd', error);
        }
      });
    },
    error: function (xhr, status, error){
        console.log('Error al obtener datos del usuario', error);
    }
  });
});

//Create random user "tecnico"
$('#create-random-user-technical').on('click', function(){
    
    $.ajax({
        url: 'https://randomuser.me/api/',
        dataType: 'json',
        success: function(data) {
            console.log(data);
    
          const user =data.results;
    
          console.log(user);
    
    
          const randomUser = {
            name: user[0].name.first,
            surname: user[0].name.last,
            email: user[0].email,
            role: 'tecnico',
            username: user[0].login.username,
            passwordUser: 'testing10',
            img: "uploads/users/imagen_predefinida.png"
          };
    
          $.ajax({
            url: "/adminusarios/añadir",
            method: 'POST',
           
            data: randomUser,
            success: function (response){
                console.log('Usuario guardado en la bdd', response);
                alert ('¡Usuario Creado Correctamente!');
            },
            error: function (xhr, status, error){
                console.log('Error al guardar en la bdd', error);
            }
          });
        },
        error: function (xhr, status, error){
            console.log('Error al obtener datos del usuario', error);
        }
      });
    });