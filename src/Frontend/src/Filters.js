import React from "react";
import { useContext } from "react";
import DataContext from "./context/DataContext";
import { normalizeText, capitalizeFirstLetter } from "./utils";

const Filter = ({ name, prompt, options = [], onChange }) => {
    return (
        <select name={name} id={name} className="dropdown px-4 py-2" onChange={onChange}>
            <option value="">-- { prompt } --</option>
            { options.map((item, idx) => {
                return (
                    <option
                        key={idx}
                        value={normalizeText(item.value)}
                    >
                        {capitalizeFirstLetter(item.label)}
                    </option>
                );
            })}
        </select>
    );
};

const Filters = () => {
    const context = useContext(DataContext);

    const technologyOptions = context.technologyOptions;
    const subTechnologyOptions = context.subTechnologyOptions;
    const vendorOptions = context.vendorOptions;
    const productTypeOptions = context.productTypeOptions;

    return (
        <div className="flex flex-row gap-4">
            <Filter
                name="tech"
                prompt="Technology"
                options={technologyOptions}
                onChange={e => context.updateTechnologyFilter(e.target.value)}
            />

            <Filter
                name="sub-tech"
                prompt="Sub technology"
                options={subTechnologyOptions}
                onChange={e => context.updateSubTechnologyFilter(e.target.value)}
            />

            <Filter
                name="vendor"
                prompt="Vendor" 
                options={vendorOptions}
                onChange={e => context.updateVendorFilter(e.target.value)}
            />

            <Filter
                name="product"
                prompt="Product"
                options={productTypeOptions}
                onChange={e => context.updateProductTypeFilter(e.target.value)}
            />
        </div>
    );
};

export default Filters;
