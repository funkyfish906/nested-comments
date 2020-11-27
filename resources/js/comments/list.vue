<template>
    <div class="tree-content">
        <div class="sticky-top">
            <div class="card">
                <div class="card-body">
                    <h1>Leave your comment</h1>
                    <comment-form :parent="0"></comment-form>
                </div>
            </div>
        </div>
       <tree-view :treeData="comments"></tree-view>
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
        this.$root.$on("delete-comment", () => {
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
