import React from "react";

const Tag = ({ label }) => {
    return (<span className="bg-blue-300 ml-1 p-1 rounded-md">{label}</span>);
};

const ListItem = ({ title, description, sku, cat, tech, subTech, vendor, productType }) => {
    return (<div className="p-4 border border-solid rounded-md mb-4">
        <div className="flex flex-row justify-between">
            <div className="font-bold">{title}</div>
            <div className="uppercase text-sm">{sku}</div>
        </div>
        <div>
            {description}
        </div>

        <div className="text-xs mt-4 flex flex-row gap-4">
            <div>DEBUG:</div>
            <div>
                cat: <Tag label={cat} />
            </div>
            <div>
                tech: <Tag label={tech} />
            </div>
            <div>
                sub-tech: <Tag label={subTech} />
            </div>
            <div>
                vendor: <Tag label={vendor} />
            </div>
            <div>
                product type: <Tag label={productType} />
            </div>
        </div>
    </div>);
};

export default ListItem;
