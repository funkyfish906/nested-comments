<template>
    <li class="list-item">
        <p>{{ node.comment }}</p>
        <a href="#" v-on:click="showForm">Leave comment</a>
        <comment-form
            :parent="node.id"
            v-bind:class="{ 'd-none': isHidden}"
        ></comment-form>
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
    },
};
</script>
