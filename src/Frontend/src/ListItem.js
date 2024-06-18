import React from "react";
import List from "./List";


const ListItem = ({ title, description, sku}) => {
    return (<div className="p-4 border border-solid rounded-md mb-4">
        <div className="flex flex-row justify-between">
            <div className="font-bold">{title}</div>
            <div className="uppercase text-sm">{sku}</div>
        </div>
        <div>
            {description}
        </div>
    </div>);
};

export default ListItem;
