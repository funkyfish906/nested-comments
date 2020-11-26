<template>
    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <comment-form :parent="0"></comment-form>
            </div>
            <div class="col-12">
                <tree-view :treeData="comments"></tree-view>
            </div>
        </div>
    </div>
</template>

<script>
import treeView from "./tree";
import commentForm from "./form";

export default {
    data() {
        return {
            comments: {},
        };
    },
    components: {
        treeView,
        commentForm,
    },
    created() {
        this.getResults();
    },
    mounted() {
        this.$root.$on("add-comment", () => {
            this.getResults();
        })
    },
    methods: {
        getResults() {
            axios
                .get("/comments/list")
                .then((response) => {
                    this.comments = response.data.list;
                })
                .catch(
                    ({
                        response: {
                            data: { errors },
                        },
                    }) => {
                        this.errors = errors;
                    }
                );
        },
    },
};
</script>
