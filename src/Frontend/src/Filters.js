import React from "react";


const dropItems = [
    'Item 1',
    'Item 2',
    'Item 3',
    'Item 4',
    'Item 5',
];

const FilterX = ({ name, prompt }) => {
    return (
        <select name={name} id={name} className="dropdown px-4 py-2">
            <option value="">{ prompt }</option>
            { dropItems.map((item, idx) => {
                return (
                    <option key={idx} value={item}>{ item }</option>
                );
            })}
        </select>
    );
};

const Filters = () => {
    return (
        <div className="flex flex-row gap-4">
            <FilterX name="tech" prompt="Technology" />
            <FilterX name="sub-tech" prompt="Sub technology" />
            <FilterX name="vendor" prompt="Vendor" />
            <FilterX name="product" prompt="Product" />
        </div>
    );
};

export default Filters;
