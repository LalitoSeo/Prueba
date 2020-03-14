<template>
    <v-app-bar app color="primary" dense dark>
            <v-toolbar-title>Titulo</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn text to="/">Inicio</v-btn>
                <v-btn text to="/home">Menu1</v-btn>
                <v-btn text to="/productos">Productos</v-btn>
                <v-btn text to="agregar">Nuevo Producto</v-btn>
            </v-toolbar-items>
        </v-app-bar>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>

</style>