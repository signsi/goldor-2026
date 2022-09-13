const { Component } = wp.element;
const { InspectorControls } = wp.blockEditor;
const { BaseControl, PanelBody } = wp.components;

class SizingDropdown extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        const {
            id,
            onChange,
            active
        } = this.props

        const options = [
            {
                val: "-"
            },
            {
                val: "0"
            },
            {
                val: "gutter"
            },
            {
                val: "element"
            },
            {
                val: "section"
            },
        ];

        return (
            <select
                className="!bg-none !p-0 flex items-center justify-center !text-[12px] !bg-transparent border-0 outline-0"
                onChange={e => {
                    onChange(id, e.target.value)
                }}
                id={id}
            >
                {options.map(opt => {
                    const { val } = opt;
                    return (
                        <option
                            value={val}
                            selected={val === active}
                        >
                            {val}
                        </option>
                    )
                })}
            </select>
        )
    }
}


export default class Spacings extends Component {

    constructor(props) {
        super(props);
        const { spacings } = props;
        this.state = {
            p: {
                t: {
                    class: '-'
                },
                r: {
                    class: '-'
                },
                b: {
                    class: '-'
                },
                l: {
                    class: '-'
                },
                ...spacings.p
            },
            m: {
                t: {
                    class: '-'
                },
                r: {
                    class: '-'
                },
                b: {
                    class: '-'
                },
                l: {
                    class: '-'
                },
                ...spacings.m
            },
        }

    }

    componentDidMount() {
        const { attributes, setAttributes } = this.props;
    }

    onChangeHandler = (id, value) => {
        this.props.onChange(id, value);
    }

    render() {

        const onChange = this.onChangeHandler;

        const data = {
            m: {
                t: {
                    className: "control-spacing-mt absolute top-0 left-0 w-full flex justify-center items-center",
                },
                r: {
                    className: "control-spacing-mr absolute top-0 right-0 h-full flex justify-center items-center",
                },
                b: {
                    className: "control-spacing-mb absolute bottom-0 left-0 w-full flex justify-center items-center",
                },
                l: {
                    className: "control-spacing-ml absolute top-0 left-0 h-full flex justify-center items-center",
                }
            },
            p: {
                t: {
                    className: "control-spacing-pt absolute top-0 left-0 w-full flex justify-center items-center",
                },
                r: {
                    className: "control-spacing-pr absolute top-0 right-0 h-full flex justify-center items-center",
                },
                b: {
                    className: "control-spacing-pb absolute bottom-0 left-0 w-full flex justify-center items-center",
                },
                l: {
                    className: "control-spacing-pl absolute top-0 left-0 h-full flex justify-center items-center",
                }
            }
        }

        return (
            <InspectorControls>
                <PanelBody
                    title="Abstände">
                    <BaseControl className="control-spacing relative h-[248px]">
                        {
                            Object.keys(data).map((key, index) => {
                                const styles = [
                                    // square wrapper
                                    // label wrapper
                                    [
                                        "control-spacing-m bg-blue-50 absolute top-[5px] left-[5px] w-[calc(100%-10px)] h-[calc(100%-10px)]",
                                        "absolute top-[2px] left-[6px] text-sm"
                                    ],
                                    [
                                        "control-spacing-p bg-gray-100 absolute top-[50px] left-[50px] w-[calc(100%-100px)] h-[calc(100%-100px)]",
                                        ""
                                    ]
                                ];
                                const children = data[key];
                                const childState = this.state[key];
                                const childElements = Object.keys(children).map((k, index) => {
                                    const val = children[k];
                                    const id = key.substring(0, 1) + '.' + k;
                                    const active = childState[k] ? childState[k].class : undefined;
                                    return (
                                        <div
                                            key={index}
                                            className={val.className}
                                        >
                                            <SizingDropdown
                                                id={id}
                                                onChange={onChange}
                                                active={active}
                                            />
                                        </div>
                                    )
                                })
                                const currentStyles = styles[index];
                                return (
                                    <div
                                        className={currentStyles[0]}
                                    >
                                        <span
                                            className={currentStyles[1]}
                                        >
                                            {key}
                                        </span>
                                        {childElements}
                                    </div>
                                )
                            })
                        }
                    </BaseControl>
                </PanelBody>
            </InspectorControls >
        )

    }
}
