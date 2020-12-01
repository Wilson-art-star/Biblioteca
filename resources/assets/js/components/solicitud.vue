<template>
    <main class="main">
            <!-- Breadcrumb 
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>-->
            <div class="container-fluid">

            

         <!--<example-component></example-component>-->
            <!--<categoria></categoria> -->
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-file-text"></i> Prestamo Libro
                        <button type="button" class="btn btn-success" data-toggle="modal" @click="abrirModal('guardar')">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">

                        <label>Usuario</label>
                        <div class="form-group form-inline">
                        <select v-model="idPerso" class="form-control col-4">
                            <option v-for="objeto in arrayPerso" :value="objeto.id" :key="objeto.id" v-text="objeto.nomCom"></option>
                        </select>
                        <label class="mx-sm-2">Fecha Devolución</label>
                        <input v-model="fecEntrega" type="date" class="form-control md-col-4">
                        </div>

                        <div class="form-group form-inline">

                            <input v-model="buscar" class="form-control col-4" placeholder="Ingrese el código del libro" type="text" @keyup.enter="getLibro(buscar)">
                            <button class="btn btn-primary" @click="getLibro(buscar)"><i class="fa fa-search"></i></button>
                            <h4 class="text-muted mx-sm-3" v-text="nomLibro"></h4>
                            <label class="mx-sm-3">Cantidad</label>
                            <input v-model="cant" type="number" class="form-control" placeholder="Cantidad Libros">
                            <button type="button" class="btn btn-success" @click="agregarItem2()">
                                <i class="icon-check"></i>
                            </button>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>

                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Autor</th>
                                    <th>Editorial</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="objeto in arrayDatos" :key="objeto.id">
                                    <td v-text="objeto.cod"></td>
                                    <td v-text="objeto.nombre"></td>
                                    <td v-text="objeto.cant"></td>
                                    <td v-text="objeto.autor"></td>
                                    <td v-text="objeto.editorial"></td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal">
                                          <i class="icon-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>

                        <button type="button" class="btn btn-primary" data-toggle="modal" @click="regSolicitud()">
                        Guardar
                        </button>
                        
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
                            <form class="form-horizontal">

                            <div class="form-group row">
                                <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="texto" name="texto" v-model="buscar" class="form-control" placeholder="Libro a buscar">
                                    <button type="button" @click="listlibro(1,buscar)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="input-group">
                                    <label class="mx-sm-3">Cantidad</label>
                                    <input v-model="cant" type="number" class="form-control" placeholder="Cantidad Libros">
                                </div>
                                </div>
                                
                            </div>

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Autor</th>
                                            <th>Editorial</th>
                                            <th>Disponibles</th>
                                            <th>Selección</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="objeto in arrayLibros" :key="objeto.id">
                                            <td v-text="objeto.id"></td>
                                            <td v-text="objeto.nombre"></td>
                                            <td v-text="objeto.nomaut"></td>
                                            <td v-text="objeto.nomedit"></td>
                                            <td v-text="objeto.cantidad"></td>
                                            <td style="width=20px"><button type="button" class="btn btn-success" @click="agregarItem(objeto)">OK</button></td>
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

                            
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal" data-dismiss="modal">Cerrar</button>
                            
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
            <!-- Inicio del modal Eliminar -->

            <!-- Fin del modal Eliminar -->
        </main>
</template>

<script>
import Toasted from 'vue-toasted';
Vue.use(Toasted);
export default {
    data() {
        return {
            arrayDatos:[],
            arrayLibros:[],
            arrayGetLibros:[],
            arrayPerso:[],
            modal:0,
            nomLibro:"",
            codLibro:"",
            autLibro:"",
            editLibro:"",
            titulo:"",
            idPerso:"",
            buscar:"",
            cant:1,
            fecEntrega:"",


            // Variables pagination
            pagination:{
            total:0,
            current_page:0,
            per_page:0,
            last_page:0,
            from:0,
            to:0
            },
            offset:3
        }
    },
    methods:{

        listlibro:function(page,buscar){
            let me = this;
            var url="/libros?page="+ page +'&buscar=' + buscar;
            axios.get(url)
            .then(function(response){
            var respuesta = response.data;
            me.arrayLibros = respuesta.libro.data,
            me.pagination=respuesta.pagination;
            })
            .catch(function(error){
            console.log(error);
            });
        },

        getLibro:function(buscar){
            let me = this;
            var url="/getlibros?buscar=" + buscar;
            axios.get(url)
            .then(function(response){
            var respuesta = response.data;
            me.arrayGetLibros = respuesta.libro;
            
            if(me.arrayGetLibros.length >0){
                me.codLibro=me.arrayGetLibros[0]['id'];
                me.nomLibro=me.arrayGetLibros[0]['nombre'];
                me.autLibro=me.arrayGetLibros[0]['nomaut'];
                me.editLibro=me.arrayGetLibros[0]['nomedit'];
            }else{
                me.nomLibro="Verifique el código o nombre";
            }

            })
            .catch(function(error){
            console.log(error);
            });
        },

        getPerso(){
            let me= this;
            var url="/getPer";
            axios.get(url)
            .then(function(response){
                var respuesta = response.data;
                me.arrayPerso= respuesta.perso;
            })
            .catch(function(error){
                console.log(error);
            });
        },
        //toma los datos que yo selecciono de la tabla modal cuando le doy al boton verde que dice "OK" y los agrega a la tabla de arrayDatos
        agregarItem:function(data=[]){
            this.arrayDatos.push({cod:data['id'],nombre:data['nombre'],cant: this.cant,autor:data['nomaut'],editorial:data['nomedit']})
            this.arrayLibros.splice(0,1);
            this.mensajeToast();
        },

        ///Agrega los datos que estan en el formulario pprincipal
        agregarItem2:function(data=[]){
            this.arrayDatos.push({cod:this.codLibro,nombre:this.nomLibro,cant:this.cant,autor:this.autLibro,editorial:this.editLibro})
            this.arrayLibros.splice(0,1);
        },

        //maestro detalle

        regSolicitud(){
            let me = this;
            var url="/solicitud/registrar";
            axios.post(url,{
                    fecE : this.fecEntrega,
                    idPerso:this.idPerso,
                    data:me.arrayDatos
            })
            .then(function(response){
                alert("Se guardo correctamente");            
            })
            .catch(function(error){
                console.log(error);
            });
        },

        abrirModal: function(){
            this.modal=1;
            this.titulo="seleccione libro";
        },

        cerrarModal: function(){
            this.modal=0;
            this.titulo="";
        },
        //mensaje en toast
        mensajeToast(){
            let toast= this.$toasted.show('Libro Agregado',{
                theme:"bubble",
                position: "top-right",
                duration: 3000,
                type:succes

            });
        },

        cambiarPagina(page,buscar,criterio){
                let me = this;
                //va a la pagina actual
                me.pagination.current_page = page;
                //envia el metodo para traer los datos
                me.listlibro(page,buscar);
            },

    },

    computed: {
        isActived: function() {
        return this.pagination.current_page;
        },
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
            this.listlibro(1,this.buscar);
            this.getPerso();
        },
        
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