
<template>
    <input type="submit" class="btn btn-danger" value="X" v-on:click="eliminarProducto">
</template>

<script>
export default {
    props: ['productoId'],

    methods: {
        eliminarProducto() {
            this.$swal({
                title: 'Desea eliminar el producto?',
                text: "Une vez eliminado, no se puede recuperar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borralo!',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    // para recibir la peticion
                    const params = {
                        id: this.productoId
                    }
                    axios.post(`/productos/${this.productoId}`, {params, _method: 'delete'})
                        .then(respuesta => {
                            this.$swal(
                                'Producto eliminado!',
                                'Tu producto ha sido eliminado',
                                'success'
                            )
                            // con la siguiente linea salgo a cada componente padre para remover a su hijo
                            this.$el.parentElement.parentElement.parentElement.removeChild(this.$el.parentElement.parentElement);

                        })
                        .catch(error => {
                            console.log(error);
                        })
                }
            })
        }
    }
}
</script>

<style scoped>

</style>
