const Save = (props) => {
    const { animation } = props.attributes;

    return (
        <div data-aos={animation}>
            <InnerBlocks.Content />
        </div>
    );
};

export default Save;
