<template>
    <ul>
        <node-tree
            v-for="(item, index) in treeData"
            :node="item"
            :key="index"
        ></node-tree>
    </ul>
</template>

<script>
import nodeTree from "./nodeTree";

export default {
    props: {
        treeData: Array | Object,
    },
    components: {
        nodeTree,
    },
};
</script>
