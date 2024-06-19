import React from "react";
import List from "./List";


const ListItem = ({ title, description, sku, cat }) => {
    return (<div className="p-4 border border-solid rounded-md mb-4">
        <div className="flex flex-row justify-between">
            <div className="font-bold">{ title }</div>
            <div className="uppercase text-sm">{ sku }</div>
        </div>
        <div>
            { description }
        </div>
        <div className="text-xs mt-2">
            cat: <span className="bg-blue-300 ml-2 px-2 py-1 rounded-md">{ cat }</span>
        </div>
    </div>);
};

export default ListItem;
