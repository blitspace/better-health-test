import React from "react";
import ListItem from "./ListItem";


const List = ({ listItems =[] }) => {
    return (
        <div>
            {listItems.map((item) => {
                return (
                    <ListItem
                        key={item.id}
                        title={item.name}
                        description={item.description}
                        sku={item.sku}
                    />
                );
            })}
        </div>
    );
};

export default List;
