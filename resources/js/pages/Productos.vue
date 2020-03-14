<template>
    <v-app>
        <Header/>
        <v-content>
            <v-container class="fill-height" fluid>
                <v-row align="center" justify="center">
                    <v-col class="text-center">
                        <v-data-table
                            :headers="headers"
                            :items="productos"
                            :items-per-page="porpage"
                            class="elevation-1"
                        ></v-data-table>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
       <FooterCore/>
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
            headers: [
                { text: "Nombre", value: "nombre" },
                { text: "Descripcion", value: "descripcion" },
                { text: "Cantidad", value: "cantidad" },
                { text: "Precio", value: "precio" },
                { text: "Codigo", value: "codigo" }
            ],
            productos: [],
            porpage: 10
        };
    }
};
</script>
