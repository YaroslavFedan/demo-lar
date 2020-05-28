<template >
    <div class="table-responsive">
        <v-jstree
            :data="treeData"
            ref="tree"
            draggable="true"
            :async="loadData"
            @item-click="itemClick"
        >
        </v-jstree>
    </div>
</template>

<script>
    import VJstree from 'vue-jstree';

    const instance = axios.create({
        baseURL:'http://laravel-shop.test/api/',
        withCredentials: true,
    });

    export default {
        name: 'tree-view',
        components: {VJstree},
        data() {
            return {
                treeData: [],
                loadData: function (oriNode, resolve) {
                    let id = oriNode.model ? oriNode.model.id : '';
                    let path = `/employees/tree/${id}`;
                    instance.get(path)
                        .then( (response) => {
                            resolve(response.data.data);
                        })
                        .catch(error => console.log(error) );
                },
            }
        },
        methods: {
            itemClick (node) {
                console.log(node.model.text + ' clicked !')
            },
        },
    };
</script>
