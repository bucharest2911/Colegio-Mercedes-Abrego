Vue.component('Correo',{
 

    template:`
    
    <div>
    <div class="   modal-dialog text-center "  >
              <div class="col-sm-8 main-section">
                <div class="modal-content">
                    <div class="col-12 Imagen-usuario">
                      <img src="Imagenes/avatar3.png">
                    </div>
                    
                    <form  @submit="enviar" class="col-12">
                       
                       <div class="form-group" id="Nombre-usuario">
                         <input type="text"id="usuario" name="usuario"class="form-control" v-model='usuarioinicio' placeholder="Ingrese Correo"/>
                       </div>
                        
                    </form>
                    <div class="col-12 forgot">
                      <a href="#" v-on:click="Ingresar">Recordar contraseña?  </a>
                    </div>
                </div>
              </div>
            </div>
    
    
    </div>

    
    `
}) 