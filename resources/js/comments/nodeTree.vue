<template>
    <li class="list-item">
        <div class="border-bottom">
            <p class="font-weight-bold">{{ node.comment }}</p>
            <p>{{ new Date(node.created_at).toLocaleDateString() }}</p>
            <a href="#" v-on:click="deleteItem(node.id)">delete</a>
            <div class="text-right">
                <a href="#" v-on:click="showForm">Reply</a>
            </div>
            <comment-form
                :parent="node.id"
                v-bind:class="{ 'd-none': isHidden }"
            ></comment-form>
        </div>
        <ul v-if="node.replies" class="tree-list">
            <node
                v-for="child in node.replies"
                :node="child"
                :key="child.id"
            ></node>
        </ul>
    </li>
</template>

<script>
import commentForm from "./form";

export default {
    data() {
        return {
            isHidden: true,
            errors: null,
        };
    },
    name: "node",
    components: {
        commentForm,
    },
    props: {
        node: Object | Array,
    },
    methods: {
        showForm() {
            this.isHidden = !this.isHidden;
        },
        deleteItem(id) {
            axios
                .delete("/comments/" + id)
                .then((response) => {
                    this.$root.$emit("delete-comment");
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
