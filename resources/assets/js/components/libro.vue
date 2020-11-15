<template>
    <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="container-fluid">

            

         <!--<example-component></example-component>-->
            <!--<categoria></categoria> -->
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-file-text"></i> Libros 
                        <button type="button" class="btn btn-success" data-toggle="modal" @click="abrirModal('guardar')">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" id="opcion" name="opcion">
                                      <option value="nombre">Nombre</option>
                                    </select>
                                    <input type="text" id="texto" name="texto" v-model="buscar" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listCat(1,criterio,buscar)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Año publicado</th>
                                    <th>Número de Paginas</th>
                                    <th>Ubicación</th>
                                    <th>Edicion</th>
                                    <th>Categoria</th>
                                    <th>Idioma</th>
                                    <th>Autor</th>
                                    <th>Editorial</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="objeto in arrayDatos" :key="objeto.id">
                                    <td v-text="objeto.nombre"></td>
                                    <td v-text="objeto.cantidad"></td>
                                    <td v-text="objeto.ano_publicado"></td>
                                    <td v-text="objeto.num_paginas"></td>
                                    <td v-text="objeto.ubicacion"></td>
                                    <td v-text="objeto.edicion"></td>
                                    <td v-text="objeto.id_categoria"></td>
                                    <td v-text="objeto.id_idioma"></td>
                                    <td v-text="objeto.id_autor"></td>
                                    <td v-text="objeto.id_editorial"></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" @click="abrirModal('editar',objeto)">
                                          <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" @click="eliminarCat(objeto)">
                                          <i class="icon-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                        <nav>
                        <ul class="pagination">
                        <li class="page-item" v-if="pagination.current_page > 1">
                            <a
                            class="page-link"
                            href="#"
                            @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)"
                            >Ant</a>
                        </li>
                        <li
                            class="page-item"
                            v-for="page in pagesNumber"
                           :key="page"
                           :class="[page == isActived ? 'active' : '']"
                        >
                           <a
                           class="page-link"
                           href="#"
                           @click.prevent="cambiarPagina(page,buscar,criterio)"
                           v-text="page"
                           ></a>
                        </li>
                        <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                           <a
                           class="page-link"
                           href="#"
                           @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)"
                           >Sig</a>
                        </li>
                        </ul>
                        </nav>
                        
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade" id="modalNuevo" :class="{'mostrar': modal}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="titulo"></h4>
                            <button type="button" class="close" @click="cerrarModal" aria-label="Close">
                              <span aria-hidden="true">X</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label" for="text-input">Nombre</label>
                                    <div class="col-md-10">
                                        <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control" placeholder="Nombre del Libro">
                                        <span class="help-block">(*) Ingrese el Nombre</span>
                                    </div>

                                    <label class="col-md-2 form-control-label" for="text-input">Cantidad</label>
                                    <div class="col-md-4">
                                        <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control" placeholder="Cantidad disponible">
                                        <span class="help-block">(*) Ingrese la Cantidad</span>
                                    </div>

                                    <label class="col-md-2 form-control-label" for="text-input">Año publicado</label>
                                    <div class="col-md-4">
                                        <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control" placeholder="Año publicación">
                                        <span class="help-block">(*) Ingrese la fecha de publicación</span>
                                    </div>

                                    <label class="col-md-2 form-control-label" for="text-input">Numero de paginas</label>
                                    <div class="col-md-4">
                                        <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control" placeholder="Numero de paginas">
                                        <span class="help-block">(*) Ingrese el Numero de paginas</span>
                                    </div>

                                    <label class="col-md-2 form-control-label" for="text-input">Ubicacion</label>
                                    <div class="col-md-4">
                                        <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control" placeholder="Ubicación">
                                        <span class="help-block">(*) Ingrese la ubicación</span>
                                    </div>

                                    <label class="col-md-2 form-control-label" for="text-input">Edicion</label>
                                    <div class="col-md-4">
                                        <input type="text" v-model="nombre" id="nombre" name="nombre" class="form-control" placeholder="Edición">
                                        <span class="help-block">(*) Ingrese la edición</span>
                                    </div>

                                    <label class="col-md-2 form-control-label" for="text-imput">Seleccione Categoria</label>
                                    <div class="col-md-4">

                                    <select class="form-control" v-model="idCat">
                                    <option v-for="objeto in arrayCat" :value="objeto.id" :key="objeto.id" v-text="objeto.nombre"></option>
                                    </select>
                                    </div>

                                     <label class="col-md-2 form-control-label" for="text-imput">Seleccione Editorial</label>
                                    <div class="col-md-4">

                                    <select class="form-control" v-model="idEdi">
                                    <option v-for="objeto in arrayEdi" :value="objeto.id" :key="objeto.id" v-text="objeto.nombre"></option>
                                    </select>
                                    </div>

                                    <label class="col-md-2 form-control-label" for="text-imput">Seleccione Idioma</label>
                                    <div class="col-md-4">

                                    <select class="form-control" v-model="idIdm">
                                    <option v-for="objeto in arrayIdm" :value="objeto.id" :key="objeto.id" v-text="objeto.nombre"></option>
                                    </select>
                                    </div>

                                     <label class="col-md-2 form-control-label" for="text-imput">Seleccione Autor</label>
                                    <div class="col-md-4">

                                    <select class="form-control" v-model="idAut">
                                    <option v-for="objeto in arrayAut" :value="objeto.id" :key="objeto.id" v-text="objeto.nombre"></option>
                                    </select>
                                    </div>
                                
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal" data-dismiss="modal">Cerrar</button>
                            <button v-show="accion==0" type="button" @click="regCat" class="btn btn-primary">Guardar</button>
                            <button v-show="accion" type="button" @click="actCat" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
            <!-- Inicio del modal Eliminar -->
            <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-danger" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Eliminar Categoría</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Estas seguro de eliminar la categoría?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" @click="eliminarCat" class="btn btn-danger">Eliminar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- Fin del modal Eliminar -->
        </main>
</template>

<script>
    export default {

        data(){
            return{
                 arrayDatos:[],
                 arrayCat: [],
                 arrayEdi: [],
                 arrayIdm: [],
                 arrayAut: [],
                 nombre:'',
                 idCat:0,
                 modal:0,
                 titulo:'',
                 accion:0,
                 idCat:0,
                 idEdi:0,
                 idIdm:0,
                 idAut:0,

                 //variables pagination
                 pagination:{
                     total:0,
                     current_page:0,
                     per_page:0,
                     last_page:0,
                     from:0,
                     to:0
                 },
                 offset:3,
                 buscar:'',
                 criterio:'nombre'
            } 
           
        },

        methods:{
            cambiarPagina(page,buscar,criterio){
                let me = this;
                //va a la pagina actual
                me.pagination.current_page = page;
                //envia el metodo para traer los datos
                me.listCat(page,criterio,buscar);
            },

            listCat(page,criterio,buscar){
                let me = this;
                var url="/libros?page="+ page + '&criterio='+ criterio+'&buscar=' + buscar;
                axios.get(url)
                .then(function(response){
                    var respuesta = response.data;
                    me.arrayDatos = respuesta.libros.data,
                    me.pagination=respuesta.pagination;
                })
                .catch(function(error){
                    console.log(error);
                });
            },

            getCat(){
                let me = this;
                var url="/getCat";
                axios.get(url)
                .then(function(response){
                    var respuesta = response.data;
                    me.arrayCat= respuesta.cat;
                })
                 .catch(function(error){
                    console.log(error);
                });
            },

             getEdi(){
                let me = this;
                var url="/getEdi";
                axios.get(url)
                .then(function(response){
                    var respuesta = response.data;
                    me.arrayEdi= respuesta.edi;
                })
                 .catch(function(error){
                    console.log(error);
                });
            },

            getIdm(){
                let me = this;
                var url="/getIdm";
                axios.get(url)
                .then(function(response){
                    var respuesta = response.data;
                    me.arrayIdm= respuesta.idm;
                })
                 .catch(function(error){
                    console.log(error);
                });
            },

            getAut(){
                let me = this;
                var url="/getAut";
                axios.get(url)
                .then(function(response){
                    var respuesta = response.data;
                    me.arrayAut= respuesta.aut;
                })
                 .catch(function(error){
                    console.log(error);
                });
            },


            regCat(){
                let me = this;
                var url = "/categorias/registrar";
                axios.post(url,{
                    nombre: this.nombre
                })
                .then(function(response){
                    me.listCat();
                    alert('Se guardo correctamente');
                    me.cerrarModal();                
                })
                .catch(function(error){
                    console.log(error);
                });
            },
            actCat(){
                let me = this;
                var url ="/categorias/actualizar";
                axios.put(url,{
                    id: this.idCat,
                    nombre : this.nombre
                })
                .then(function(response){
                    me.listCat();
                    alert("Se actualizo correctamente");
                    me.cerrarModal();
                })
                .catch(function(error){
                    console.log(error);
                });
            },
            eliminarCat(data=[]){
                let me = this;
                var url = "/categorias/eliminar";
                axios.post(url,{
                    id:data['id']
                })
                .then(function(response){
                   me.listCat();
                   alert('Se elimino correctamente');
                })
                .catch(function(error){
                    console.log(error);
                });

            },
            /////////////////////////////////////////////////////////
            abrirModal(accion, data=[]){
                switch (accion) {
                    case 'guardar':
                        this.titulo='Registrar Categoria';
                        this.accion=0;
                        this.limpiar();
                        
                        break;

                    case 'editar':
                        this.titulo='Editar Categoria';
                        this.accion=1;
                        this.idCat= data['id'];
                        this.nombre= data['nombre'];
                    break;
                
                    default:
                        break;
                }
                this.modal=1;

            },
            cerrarModal(){
                this.modal=0;

            },
            limpiar(){
                this.nombre='';
            }
        },
        computed: {
        isActived: function() {
        return this.pagination.current_page;
        },
        //Calcula los elementos de la paginación
        pagesNumber: function() {
        if (!this.pagination.to) {
            return [];
        }

        var from = this.pagination.current_page - this.offset;
        if (from < 1) {
            from = 1;
        }

        var to = from + this.offset * 2;
        if (to >= this.pagination.last_page) {
            to = this.pagination.last_page;
        }

        var pagesArray = [];
        while (from <= to) {
        pagesArray.push(from);
        from++;
        }
        return pagesArray;
        }
        },

        mounted() {
            console.log('Component mounted.')
            this.listCat(1,this.criterio,this.buscar);
            this.getCat();
            this.getEdi();
            this.getIdm();
            this.getAut();
            
        }
    }
</script>

<style>

.modal-content{
    width: 100% !important;
    position: absolute !important;
}

.mostrar{
    display: list-item !important;
    opacity: 1 !important;
    position: absolute !important;
    background-color: #bbb4b47a;
}

</style>