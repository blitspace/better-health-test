import React from "react";

const cats = [
    'Advisory',
    'Design',
    'Implementation',
    'Support',
    'Assessments',
    'Trainings',
];

const CatNav = ({activeIndx}) => {
    return (
        <div>
            <div className="relative">
                <div className="cat-item--all">
                    <a
                        href="#"
                        className={`${activeIndx === 'all' ? 'active' : ''} block text-white px-4 py-4 bg-gray-300 rounded-md text-center hover:bg-blue-300`}
                    >
                        All Life Cycle
                    </a>
                </div>
            </div>
            <div className="relative">
                {cats.map((cat, idx) => {
                    let activeClass = '';
                    if (idx === activeIndx) {
                        activeClass = 'active';
                    }
                    return (
                        <div
                            key={idx}
                            className="cat-item px-4 relative"
                        >
                            <a
                                href="#"
                                className={`${activeClass} block text-white px-4 py-2 bg-gray-300 rounded-md text-center hover:bg-blue-300`}
                            >{cat}</a>
                        </div>
                    );
            })}
            </div>
        </div>
    );
};

export default CatNav;
