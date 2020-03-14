<template>
    <v-app>
        <Header />
        <v-content>
            <v-container class="fill-height" fluid>
                <v-row align="center" justify="center">
                    <v-col class="text-center">
                        <v-form ref="form" v-model="nuevop">
                            <v-text-field
                                v-model="nombre"
                                label="Nombre"
                                :rules="nombreRules"
                                type="text"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="descripcion"
                                label="Descripcion"
                                type="text"
                            ></v-text-field>
                            <v-text-field
                                v-model="cantidad"
                                :rules="cantidadRules"
                                label="Cantidad"
                                type="number"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="precio"
                                :rules="precioRules"
                                label="Precio"
                                prefix="$"
                                type="number"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="codigo"
                                :rules="codigoRules"
                                label="Codigo"
                                type="text"
                                required
                            ></v-text-field>
                            <v-btn color="success" class="ma-4" @click="enviar">
                                Enviar
                            </v-btn>
                        </v-form>
                    </v-col>
                </v-row>
                <v-snackbar v-model="snackbar">
                    {{ text }}
                    <v-btn color="pink" text @click="snackbar = false">
                        Close
                    </v-btn>
                </v-snackbar>
            </v-container>
        </v-content>
        <FooterCore />
        <v-overlay :value="overlay">
            <v-btn text>
                Cargando...
            </v-btn>
        </v-overlay>
    </v-app>
</template>

<script>
import Header from "../components/Header";
export default {
    components: {
        Header,
        FooterCore: () => import("../components/Footer")
    },
    data() {
        return {
            overlay: false,
            nuevop: false,
            nombre: "",
            descripcion: "",
            cantidad: 0,
            precio: 0,
            codigo: "",
            nombreRules: [v => !!v || "El nombre es requerido"],
            cantidadRules: [v => !!v || "La cantidad es requerida"],
            precioRules: [v => !!v || "El precio es requerido"],
            codigoRules: [v => !!v || "El codigo es requerido"],
            snackbar: false,
            text: "Error verifique"
        };
    },
    methods: {
        enviar() {
            this.$refs.form.validate();
            if (this.nuevop) {
                let url = `/api/productos`;
                this.overlay = true;
                this.$http
                    .post(url, {
                        nombre: this.nombre,
                        descripcion: this.descripcion,
                        cantidad: this.cantidad,
                        precio: this.precio,
                        codigo: this.codigo
                    })
                    .then(response => {
                        this.$refs.form.reset();
                        this.text = "Producto guardado";
                        this.snackbar = true;
                        this.overlay = false;
                    })
                    .catch(errors => {
                        alert(JSON.stringify(errors.response.data.data));
                        this.overlay = false;
                    });
            } else {
                this.snackbar = true;
            }
        }
    }
};
</script>