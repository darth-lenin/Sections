<template>
    <div class="wrapper">
        <v-subheader class="title justify-center">Новости</v-subheader>
        <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
            <v-card>
                <v-toolbar color="primary" dark>
                    <v-btn icon dark @click.native="dialog = false">
                        <v-icon>close</v-icon>
                    </v-btn>
                    <v-toolbar-title>Просмотр новости</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-toolbar-items>
                        <v-btn dark flat @click="activeItem(itemForView)">Активировать</v-btn>
                    </v-toolbar-items>
                </v-toolbar>
                <v-flex xs12 sm6 offset-sm3>
                    <v-card>
                        <v-card-media
                                class="black--text"
                                :src="getPath()"
                        >
                            <v-container fill-height fluid>
                                <v-layout fill-height>
                                    <v-flex xs12 align-end flexbox>
                                        <h3 class="headline">{{itemForView.title}}</h3>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                        </v-card-media>
                        <v-card-text>
                            <div>
                                <h2 class="grey--text">{{itemForView.description}}</h2><br>
                            </div>
                        </v-card-text>
                        <v-card-text>
                            <div>
                                <span class="grey--text">{{itemForView.content}}</span><br>
                            </div>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn color="orange darken-2" @click.native="dialog = false">
                                <v-icon dark left>arrow_back</v-icon>
                                Назад
                            </v-btn>
                            <v-btn color="success" @click="activeItem(itemForView)">
                                <v-icon dark left>check_circle</v-icon>
                                Активировать
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-flex>
                <v-divider></v-divider>
            </v-card>
        </v-dialog>
        <v-card>
            <v-card-title>
                Новости
                <v-spacer></v-spacer>
                <v-text-field
                        v-model="search"
                        append-icon="search"
                        label="Поиск"
                        single-line
                        hide-details
                ></v-text-field>
            </v-card-title>
            <v-data-table
                    :headers="headers"
                    :items="news"
                    :search="search"
            >
                <template slot="items" slot-scope="props">
                    <td>{{ props.item.created_at }}</td>
                    <td>{{ props.item.title }}</td>
                    <td>{{ props.item.section_name }}</td>
                    <td>
                        <v-btn icon class="mx-0" @click="viewItem(props.item)">
                            <v-icon color="teal">pageview</v-icon>
                        </v-btn>
                        <v-btn icon class="mx-0" @click="activeItem(props.item)">
                            <v-icon color="green">offline_pin</v-icon>
                        </v-btn>
                        <v-btn icon class="mx-0" @click="deleteItem(props.item)">
                            <v-icon color="pink">delete</v-icon>
                        </v-btn>
                    </td>
                </template>
                <template slot="no-data">
                    <v-alert :value="true" color="info" icon="warning">
                        Нет данных.
                    </v-alert>
                </template>
                <v-alert slot="no-results" :value="true" color="error" icon="warning">
                    Ваш поиск по "{{ search }}" не дал результатов.
                </v-alert>
            </v-data-table>
        </v-card>
    </div>
</template>

<script>
    import Auth from "../../helpers/Auth";

    export default {
        data() {
            return {
                search: '',
                headers: [
                    {text: 'Дата создания', value: 'created_at'},
                    {text: 'Заголовок', value: 'title'},
                    {text: 'Секция', value: 'section_name'},
                    {text: 'Управление', sortable: false,}
                ],
                news: [],
                dialog: false,
                itemForView: {}
            }
        },
        created() {
            Auth.check();
            this.initialize();
        },
        methods: {
            initialize() {
                axios.get('/api/news').then(response => {
                    this.news = response.data.data;
                });
            },
            deleteItem(item) {
                const index = this.news.indexOf(item);
                let answer = confirm('Вы действительно хотите удалить эту запись?');
                if (answer) {
                    axios.delete(`/api/news/` + item.id).then(response => {
                        if (response.data.status == 'success') {
                            this.news.splice(index, 1);
                            this.$store.commit("showInfo", response.data.message);
                        }
                    });
                }
            },
            activeItem(item) {
                const index = this.news.indexOf(item);
                item.active = true;
                axios.patch('/api/news/' + item.id, item).then(response => {
                    if (response.data.status) {
                        this.news.splice(index, 1);
                        this.$store.commit("showInfo", response.data.message);
                    }
                });
                this.dialog = false;
            },
            viewItem(item) {
                this.itemForView = item;
                this.dialog = true;
            },
            getPath() {
                return "/images/" + this.itemForView.image_name;
            }
        }
    }
</script>