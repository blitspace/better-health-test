import React from "react";
import { normalizeText } from "./utils";


const Tag = ({ label }) => {
    return (<span className="bg-blue-300 ml-1 p-1 rounded-md">{label}</span>);
};

const ListItem = ({ title, description, sku, cat, tech, subTech, vendor, productType }) => {
    return (<div className="p-4 border border-solid rounded-md mb-4 border-gray-300">
        <div className="flex flex-row justify-between mb-4">
            <div className="font-bold">{title}</div>
            <div className="uppercase text-xs">{sku}</div>
        </div>
        <div className="text-sm">
            {description}
        </div>

        <div className="text-xs mt-4 flex flex-row gap-4">
            <div>DEBUG:</div>
            <div className="flex flex-row gap-2 flex-wrap">
                <div>
                    cat: <Tag label={normalizeText(cat)} />
                </div>
                <div>
                    tech: <Tag label={normalizeText(tech)} />
                </div>
                <div>
                    sub-tech: <Tag label={normalizeText(subTech)} />
                </div>
                <div>
                    vendor: <Tag label={normalizeText(vendor)} />
                </div>
                <div>
                    product type: <Tag label={normalizeText(productType)} />
                </div>
            </div>
        </div>
    </div>);
};

export default ListItem;
