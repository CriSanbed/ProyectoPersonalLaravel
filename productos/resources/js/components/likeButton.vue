<template>
    <div>
        <span class="like-btn" @click="likeProducto" :class="{'like-active' : this.like}"></span>
        <p>{{ cantidadLikes }} Les gustó esta producto</p>
    </div>
</template>

<script>
export default {
    // CAPTURANDO PROPS
    props: ['productoId', 'like', 'likes'],
    data: function () {
        return {
            totalLikes: this.likes

        }
    },
    methods: {
        likeProducto() {
            axios.post('/productos/' + this.productoId)
                .then(respuesta => {
                    if (respuesta.data.attached.length > 0) {
                        this.$data.totalLikes++;
                    } else {
                        this.$data.totalLikes--;
                    }
                })
                .catch(error => {
                    if (error.response.status == 401) {
                        this.$swal({
                            icon: 'error',
                            iconColor: '#3b080b',
                            title: 'Oopss....',
                            text: 'Aún no eres usuario para dar like!',
                            footer: '<a href="/register">Registraté aquí</a>'
                        })


                    }
                });
        }
    },
    computed: {
        cantidadLikes: function () {
            return this.totalLikes;
        }
    }
}
</script>

<style scoped>

</style>
